<?php

namespace App\Notifications;

use App\Models\Brand;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BrandAdminAccessNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Brand $brand,
        protected string $password,
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Vanta account welcome: to the circle of the 1%')
            ->greeting('Welcome to the circle of the 1%')
            ->line('Your Vanta Command Center account has been provisioned for ' . $this->brand->name . '.')
            ->line('Login: ' . url('/admin/login'))
            ->line('Email: ' . $notifiable->email)
            ->line('Temporary password: ' . $this->password)
            ->line('Please change this password from your console after your first login.');
    }
}
