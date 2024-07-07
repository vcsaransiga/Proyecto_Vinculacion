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
                    ->line('Tu código de verificación es: ' . $this->code)
                    ->line('Si no solicitaste este código, puedes ignorar este correo.')
                    ->line('Gracias por usar nuestra aplicación!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
