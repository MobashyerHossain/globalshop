<?php

namespace App\Notifications\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConsumerRegistrationNotification extends Notification
{
    use Queueable;

    protected $consumer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($consumer)
    {
        $this->consumer = $consumer;
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
                    ->line('Dear, '.$this->consumer->getFullName())
                    ->line('You have created a new Account. Please verify the Account before you can use all of our services.')
                    ->action('Verify Account', route('consumer.verify', $this->consumer->id))
                    ->line('Thank you!');
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
