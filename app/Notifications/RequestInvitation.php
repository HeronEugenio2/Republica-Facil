<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestInvitation extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->data['userName'] . ' enviou pra você uma solicitação para participar da república ' . $this->data['republicName'] . '.')
            ->action('Visualizar', url('/'))
            ->line('Obrigado por usar nosso aplicativo!')
            ->subject('Convite para República');
    }

    /**
     * Get the array representation of the notification.
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
