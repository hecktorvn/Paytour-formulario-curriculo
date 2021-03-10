<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Resume;

class ResumeSend extends Notification
{
    use Queueable;

    private $resume;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Resume $resume)
    {
        $this->resume = $resume;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from($this->resume->email)
                    ->subject('Paytour - Currículo recebido!')
                    ->line("Olá {$this->resume->name}, seu currículo foi recebido com sucesso!")
                    ->line("Os dados enviados foram.:")
                    ->line("")
                    ->line('Nome: ' . $this->resume->name)
                    ->line('E-mail: ' . $this->resume->email)
                    ->line('Telefone: ' . $this->resume->phone)
                    ->line('Cargo: ' . $this->resume->office)
                    ->line('Escolaridade: ' . $this->resume->getSchooling())
                    ->line('Observação:')
                    ->line($this->resume->note);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
