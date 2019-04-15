<?php

namespace App\Notifications\CarHandler;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplyForLoanNotification extends Notification
{
    use Queueable;

    protected $loanInfo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->loanInfo = $info;
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
                    ->line('Dear, '.$this->loanInfo->getConsumer()->getFullName())
                    ->line('We have recieved your application of loan for the following car,')
                    ->line($this->loanInfo->getCar()->name)
                    ->line('After carefully analyzing you case, we will let you know our decision.')
                    ->line('Until than wait patiantly and browse more of our products')
                    ->action('Browse Products', route('index'))
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
