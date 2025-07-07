<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Redefinição de senha - ' . config('app.name'))
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Você está recebendo este e-mail porque foi solicitada a redefinição da senha da sua conta.')
            ->action('Redefinir Senha', $url)
            ->line('Se você não solicitou a redefinição, nenhuma ação é necessária.')
            ->salutation('Atenciosamente, Equipe ' . config('app.name'));
    }
}
