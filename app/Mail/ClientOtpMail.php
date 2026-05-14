<?php

namespace App\Mail;

use App\Models\VipClient;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public VipClient $vipClient,
        public string $code,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "{$this->vipClient->brand->name} confirmation code",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.client-otp',
        );
    }
}
