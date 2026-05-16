<?php

namespace Tests\Feature;

use App\Models\CardInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_card_inquiry_can_be_submitted(): void
    {
        $response = $this->post(route('cards.inquiry.store'), [
            'company_name' => 'Essence Kigali',
            'contact_name' => 'Amina R.',
            'email' => 'amina@example.com',
            'phone' => '+250788000000',
            'design_type' => 'titanium_steel',
            'quantity' => 25,
            'intent' => 'inquiry',
            'notes' => 'Interested in a private titanium run.',
        ]);

        $response
            ->assertRedirect(route('cards.index'))
            ->assertSessionHas('card_inquiry_status');

        $this->assertDatabaseHas(CardInquiry::class, [
            'company_name' => 'Essence Kigali',
            'contact_name' => 'Amina R.',
            'email' => 'amina@example.com',
            'design_type' => 'titanium_steel',
            'quantity' => 25,
            'intent' => 'inquiry',
            'status' => 'new',
        ]);
    }
}
