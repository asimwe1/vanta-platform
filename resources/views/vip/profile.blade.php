<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $isWhiteLabel = ! ($brand->branding_visible ?? true) || in_array($brand->subscription_tier ?? 'tier_1', ['tier_2', 'tier_3'], true);
        $brandAccessTitle = "{$brand->name} Private Access";
        $pageTitle = $isWhiteLabel ? $brandAccessTitle : "{$vipClient->full_name} · {$brand->name} VIP Profile | Vanta";
        $pageDescription = $brand->description ?: "Private VIP access for {$brand->name} clients.";
        $shareImage = filled($brand->logo_path) ? asset('storage/' . $brand->logo_path) : null;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta property="og:type" content="profile">
    <meta property="og:title" content="{{ $isWhiteLabel ? $brandAccessTitle : $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $isWhiteLabel ? $brand->name : 'Vanta' }}">
    <meta name="twitter:card" content="{{ $shareImage ? 'summary_large_image' : 'summary' }}">
    <meta name="twitter:title" content="{{ $isWhiteLabel ? $brandAccessTitle : $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    @if($shareImage)
        <meta property="og:image" content="{{ $shareImage }}">
        <meta property="og:image:alt" content="{{ $brand->name }} private access">
        <meta name="twitter:image" content="{{ $shareImage }}">
    @endif
    @if($isWhiteLabel && filled($brand->logo_path))
        <link rel="icon" href="{{ $shareImage }}">
    @endif
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <main class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-[radial-gradient(circle_at_18%_18%,rgba(245,158,11,0.18),transparent_30%),radial-gradient(circle_at_82%_20%,rgba(20,184,166,0.14),transparent_26%),linear-gradient(135deg,#09090b_0%,#18181b_54%,#27272a_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-zinc-950 to-transparent"></div>
        </div>

        <header class="relative z-10 mx-auto flex max-w-6xl items-center justify-between px-6 py-6">
            <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Vanta Platform home">
                @if(! ($brand->branding_visible ?? true) && filled($brand->logo_path))
                    <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="size-9 border border-white/10 object-cover">
                @else
                    <span class="grid size-9 place-items-center border border-amber-300/60 bg-amber-300 text-sm font-semibold text-zinc-950">V</span>
                @endif
                <span class="text-sm font-medium uppercase tracking-[0.28em] text-zinc-200">{{ ($brand->branding_visible ?? true) ? 'Vanta' : $brand->name }}</span>
            </a>
            <a href="{{ url('/admin/login') }}" class="border border-white/20 px-4 py-2 text-sm font-medium text-white transition hover:border-amber-300 hover:text-amber-200">Admin</a>
        </header>

        <section class="relative z-10 mx-auto grid min-h-[calc(100vh-88px)] max-w-6xl items-center gap-10 px-6 pb-16 pt-10 lg:grid-cols-[0.85fr_1.15fr]">
            <div>
                <p class="mb-5 text-xs font-semibold uppercase tracking-[0.36em] text-amber-200">{{ $brand->name }}</p>
                <h1 class="text-5xl font-light leading-[1.02] tracking-tight text-white sm:text-6xl">{{ $vipClient->full_name }}</h1>
                <p class="mt-5 text-lg text-zinc-300">Member {{ $vipClient->membership_code }}</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('landing') }}" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Back home</a>
                    <a href="{{ url('/admin/login') }}" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">Open admin</a>
                </div>
            </div>

            <div class="border border-white/10 bg-white/[0.06] p-4 shadow-2xl shadow-black/30 backdrop-blur">
                <div class="border border-white/10 bg-zinc-950">
                    <div class="border-b border-white/10 px-6 py-5">
                        <p class="text-xs uppercase tracking-[0.28em] text-amber-200">Public profile</p>
                        <h2 class="mt-2 text-2xl font-light text-white">Concierge Notes</h2>
                    </div>
                    <div class="space-y-5 p-6">
                        @if($vipClient->notes)
                            <p class="leading-8 text-zinc-300">{{ $vipClient->notes }}</p>
                        @else
                            <p class="leading-8 text-zinc-300">No public concierge notes are available for this profile.</p>
                        @endif

                        <div class="grid gap-px bg-white/10 sm:grid-cols-3">
                            <div class="bg-zinc-950 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Status</p>
                                <p class="mt-2 text-sm text-zinc-100">Active</p>
                            </div>
                            <div class="bg-zinc-950 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Access</p>
                                <p class="mt-2 text-sm text-zinc-100">Public</p>
                            </div>
                            <div class="bg-zinc-950 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Brand</p>
                                <p class="mt-2 text-sm text-zinc-100">{{ $brand->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 mx-auto max-w-6xl px-6 pb-16">
            <div class="border border-white/10 bg-white/[0.06] p-4 shadow-2xl shadow-black/30 backdrop-blur">
                <div class="border border-white/10 bg-zinc-950">
                    <div class="border-b border-white/10 px-6 py-5">
                        <p class="text-xs uppercase tracking-[0.28em] text-amber-200">Private action</p>
                        <h2 class="mt-2 text-2xl font-light text-white">Submit a service request</h2>
                        <p class="mt-2 max-w-2xl text-sm leading-6 text-zinc-400">Requests are confirmed by email code before they reach the concierge team.</p>
                    </div>

                    <div class="p-6">
                        @if(session('request_confirmed'))
                            <div class="mb-5 border border-emerald-300/30 bg-emerald-300/10 px-4 py-3 text-sm text-emerald-100">
                                {{ session('request_confirmed') }}
                            </div>
                        @endif

                        @if(session('otp_sent'))
                            <div class="mb-5 border border-amber-300/30 bg-amber-300/10 px-4 py-3 text-sm text-amber-100">
                                {{ session('otp_sent') }}
                            </div>
                        @endif

                        @error('otp')
                            <div class="mb-5 border border-red-300/30 bg-red-300/10 px-4 py-3 text-sm text-red-100">
                                {{ $message }}
                            </div>
                        @enderror

                        @if($isDemo)
                            <div class="border border-white/10 bg-white/[0.04] px-4 py-3 text-sm leading-6 text-zinc-300">
                                Demo profiles show the dynamic request schema but do not send confirmation emails.
                            </div>
                        @else
                            <form method="POST" action="{{ route('vip.request.send-otp', $vipClient->slug) }}" class="grid gap-5 md:grid-cols-2">
                                @csrf
                                <input type="hidden" name="type" value="{{ $brand->category === 'restaurant' ? 'reservation' : 'inquiry' }}">

                                @foreach($formSchema as $field)
                                    <x-dynamic-input :field="$field" />
                                @endforeach

                                <div class="md:col-span-2">
                                    <button type="submit" class="bg-amber-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">
                                        Send confirmation code
                                    </button>
                                </div>
                            </form>

                            @if($pendingOtp)
                                <form method="POST" action="{{ route('vip.request.verify-otp', $vipClient->slug) }}" class="mt-8 border-t border-white/10 pt-6">
                                    @csrf
                                    <label class="block max-w-sm">
                                        <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Email code</span>
                                        <input name="otp_code" inputmode="numeric" autocomplete="one-time-code" class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-200" placeholder="123456" required>
                                    </label>
                                    @error('otp_code')
                                        <span class="mt-2 block text-sm text-red-300">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="mt-4 border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:border-white/50">
                                        Confirm request
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <footer class="relative z-10 mx-auto flex max-w-6xl justify-end px-6 pb-8">
            @include('partials.powered-by', ['brand' => $brand])
        </footer>
    </main>
</body>
</html>
