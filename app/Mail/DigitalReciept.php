<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Purchase\Invoice;

class DigitalReciept extends Mailable
{
    use Queueable, SerializesModels;

    public $invoce;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoce)
    {
        $this->invoce = $invoce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.consumer.digitalReciept',['invoice' => $this->invoce]);
    }
}
