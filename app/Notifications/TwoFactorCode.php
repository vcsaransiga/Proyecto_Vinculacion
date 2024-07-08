<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCode extends Notification
{
    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Código de verificación de dos factores')
                    ->view('email.two_factor_code', ['code' => $this->code]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
