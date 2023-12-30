<?php

namespace app\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MagicLink extends Notification
{
    use Queueable;

    protected string $magicUrl;

    public function __construct($magicUrl)
    {
        $this->magicUrl = $magicUrl;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $magicUrl = $this->magicUrl;

        return (new MailMessage)
            ->subject('Your Login Link to ' . config('app.name'))
            ->greeting('Hello!')
            ->line('Click the link below to login into your account.')
            ->action('Login Now', $magicUrl);
    }
}
