<?php

namespace App\Http\Controllers;

use App\Models\CardInquiry;
use App\Support\CardDesigns;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CardInquiryController extends Controller
{
    public function index(): View
    {
        return view('cards.index', [
            'designs' => [
                'matte_black' => [
                    'name' => 'Matte Black Steel',
                    'finish' => 'Satin black 304 steel',
                    'price' => 'Starting at $15 / unit',
                    'accent' => 'amber',
                    'description' => 'The signature Vanta finish for private clubs, hotels, and invitation-only client lists.',
                    'features' => ['Laser-etched identity', 'NFC enabled', 'Low-glare finish'],
                ],
                'brushed_gold' => [
                    'name' => 'Brushed Gold Steel',
                    'finish' => 'Warm brushed metal',
                    'price' => 'Starting at $15 / unit',
                    'accent' => 'gold',
                    'description' => 'A high-signal option for hospitality, premium retail, and members-only experiences.',
                    'features' => ['Brushed grain', 'Amber edge detail', 'NFC enabled'],
                ],
                'graphite_steel' => [
                    'name' => 'Graphite Steel',
                    'finish' => 'Deep graphite polish',
                    'price' => 'Starting at $15 / unit',
                    'accent' => 'graphite',
                    'description' => 'Quiet and technical, built for brands that want a restrained command-center look.',
                    'features' => ['Graphite face', 'Subtle engraving', 'NFC enabled'],
                ],
                'titanium_steel' => [
                    'name' => 'Titanium Steel',
                    'finish' => 'Brushed titanium face',
                    'price' => 'Starting at $15 / unit',
                    'accent' => 'titanium',
                    'description' => 'A lighter industrial finish for venues that want a crisp, technical metal presence.',
                    'features' => ['Titanium face', 'Brushed texture', 'NFC enabled'],
                ],
                'custom' => [
                    'name' => 'Custom Design Request',
                    'finish' => 'Quoted fabrication',
                    'price' => 'Custom quote',
                    'accent' => 'custom',
                    'description' => 'For custom logos, special finishing, limited drops, or a complete APHEZIS design pass.',
                    'features' => ['Logo adaptation', 'Custom finish', 'Manual quote'],
                ],
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:160'],
            'contact_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:60'],
            'design_type' => ['required', 'string', 'in:' . implode(',', array_keys(CardDesigns::options()))],
            'quantity' => ['required', 'integer', 'min:10', 'max:5000'],
            'intent' => ['required', 'string', 'in:order,inquiry'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        CardInquiry::create($validated + ['status' => 'new']);

        return redirect()
            ->route('cards.index')
            ->with('card_inquiry_status', $validated['intent'] === 'order'
                ? 'Your card order request has been received. APHEZIS will confirm the production details before anything is approved.'
                : 'Your design inquiry has been received. APHEZIS will follow up with recommendations and next steps.');
    }
}
