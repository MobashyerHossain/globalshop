<?php

namespace App\Notifications\CarHandler;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CarBookingNotification extends Notification
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
                    ->line('This is the digital reciept for the car you just booked.')
                    ->line('Remember, this car can only be held for 7 days, after that it will again be put up for sale.')
                    ->line('Please complete the payment at our showroom and claim your new car')
                    ->line('Thank you for using our application!');
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
