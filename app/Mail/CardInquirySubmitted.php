<?php

namespace App\Mail;

use App\Models\CardInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CardInquirySubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public CardInquiry $inquiry,
        public bool $senderCopy = false,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $prefix = $this->senderCopy ? 'Copy received' : 'New request';

        return new Envelope(
            replyTo: [
                new Address($this->inquiry->email, $this->inquiry->contact_name),
            ],
            subject: $prefix . ': ' . str($this->inquiry->intent)->headline() . ' from ' . $this->inquiry->company_name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.card-inquiry-submitted',
            with: [
                'inquiry' => $this->inquiry,
                'senderCopy' => $this->senderCopy,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
