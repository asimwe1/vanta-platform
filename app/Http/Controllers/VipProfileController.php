<?php

namespace App\Http\Controllers;

use App\Mail\ClientOtpMail;
use App\Models\ServiceRequest;
use App\Models\VipClient;
use App\Support\DefaultSchemas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Fluent;
use Illuminate\View\View;

class VipProfileController extends Controller
{
    public function demo(): View
    {
        $vipClient = new Fluent([
            'full_name' => 'Amina Ruzindana',
            'slug' => 'demo',
            'membership_code' => 'VIP-DEMO',
            'notes' => 'Prefers private previews, structured appointment windows, and concise post-visit summaries from the concierge team.',
            'brand' => new Fluent([
                'name' => 'Vanta Atelier',
                'category' => 'restaurant',
                'form_schema' => DefaultSchemas::restaurant(),
            ]),
        ]);

        return view('vip.profile', [
            'vipClient' => $vipClient,
            'brand' => $vipClient->brand,
            'formSchema' => $vipClient->brand->form_schema,
            'isDemo' => true,
            'pendingOtp' => false,
        ]);
    }

    public function show(Request $request, string $slug): View
    {
        $vipClient = VipClient::query()
            ->with('brand')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $vipClient->forceFill(['last_login_at' => now()])->save();
        $request->session()->put($this->sessionAccessKey($vipClient), true);

        return $this->profileView($vipClient);
    }

    public function sendOtp(Request $request, string $slug): RedirectResponse
    {
        $vipClient = $this->authorizedVipClient($request, $slug);
        $schema = $this->schemaFor($vipClient);
        $validated = $request->validate($this->rulesFor($schema));
        $payload = $validated['payload'] ?? [];

        if (blank($vipClient->email)) {
            return back()
                ->withInput()
                ->withErrors(['otp' => 'This VIP profile does not have an email address for confirmation codes.']);
        }

        $code = (string) random_int(100000, 999999);

        $vipClient->forceFill([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10),
        ])->save();

        $request->session()->put($this->sessionPayloadKey($vipClient), [
            'type' => $request->string('type', 'inquiry')->toString(),
            'payload' => [
                ...$payload,
                'source_url' => $request->headers->get('referer') ?: $request->fullUrl(),
                'device_info' => $request->userAgent(),
            ],
        ]);

        Mail::to($vipClient->email)->send(new ClientOtpMail($vipClient, $code));

        return back()->with('otp_sent', 'Confirmation code sent to ' . $vipClient->email . '.');
    }

    public function verifyOtp(Request $request, string $slug): RedirectResponse
    {
        $vipClient = $this->authorizedVipClient($request, $slug);

        $validated = $request->validate([
            'otp_code' => ['required', 'digits:6'],
        ]);

        if (
            blank($vipClient->otp_code) ||
            blank($vipClient->otp_expires_at) ||
            $vipClient->otp_expires_at->isPast() ||
            ! hash_equals($vipClient->otp_code, $validated['otp_code'])
        ) {
            return back()->withErrors(['otp_code' => 'The confirmation code is invalid or expired.']);
        }

        $pending = $request->session()->pull($this->sessionPayloadKey($vipClient));

        if (! $pending) {
            return back()->withErrors(['otp_code' => 'Your request expired. Please submit it again.']);
        }

        ServiceRequest::query()->create([
            'brand_id' => $vipClient->brand_id,
            'vip_client_id' => $vipClient->id,
            'type' => $pending['type'] ?? 'inquiry',
            'data_payload' => $pending['payload'] ?? [],
            'status' => 'pending',
        ]);

        $vipClient->forceFill([
            'otp_code' => null,
            'otp_expires_at' => null,
        ])->save();

        return back()->with('request_confirmed', 'Your private request has been confirmed.');
    }

    protected function profileView(VipClient $vipClient): View
    {
        return view('vip.profile', [
            'vipClient' => $vipClient,
            'brand' => $vipClient->brand,
            'formSchema' => $this->schemaFor($vipClient),
            'isDemo' => false,
            'pendingOtp' => session()->has($this->sessionPayloadKey($vipClient)),
        ]);
    }

    protected function authorizedVipClient(Request $request, string $slug): VipClient
    {
        $vipClient = VipClient::query()
            ->with('brand')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        abort_unless($request->session()->get($this->sessionAccessKey($vipClient)), 403);

        return $vipClient;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    protected function schemaFor(VipClient $vipClient): array
    {
        return $vipClient->brand->form_schema ?: DefaultSchemas::for($vipClient->brand->category);
    }

    /**
     * @param  array<int, array<string, mixed>>  $schema
     * @return array<string, array<int, string>>
     */
    protected function rulesFor(array $schema): array
    {
        $rules = [
            'type' => ['nullable', 'string', 'max:80'],
            'payload' => ['required', 'array'],
        ];

        foreach ($schema as $field) {
            $name = $field['variable_name'] ?? null;

            if (! $name) {
                continue;
            }

            $fieldRules = [($field['is_required'] ?? false) ? 'required' : 'nullable'];

            $fieldRules[] = match ($field['type'] ?? 'text') {
                'number' => 'numeric',
                'date' => 'date',
                default => 'string',
            };

            $rules["payload.{$name}"] = $fieldRules;
        }

        return $rules;
    }

    protected function sessionAccessKey(VipClient $vipClient): string
    {
        return "vip_access_{$vipClient->id}";
    }

    protected function sessionPayloadKey(VipClient $vipClient): string
    {
        return "vip_pending_payload_{$vipClient->id}";
    }
}
