<?php

namespace Tests\Feature;

use App\Mail\CardInquirySubmitted;
use App\Models\CardInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CardInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_card_inquiry_can_be_submitted(): void
    {
        Mail::fake();

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

        Mail::assertSent(CardInquirySubmitted::class, function (CardInquirySubmitted $mail): bool {
            return $mail->hasTo(config('mail.enquiries.address'))
                && ! $mail->senderCopy
                && $mail->inquiry->email === 'amina@example.com';
        });

        Mail::assertSent(CardInquirySubmitted::class, function (CardInquirySubmitted $mail): bool {
            return $mail->hasTo('amina@example.com')
                && $mail->senderCopy
                && $mail->inquiry->company_name === 'Essence Kigali';
        });
    }
}
