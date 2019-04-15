<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    public $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin, $pass)
    {
        $this->admin = $admin;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.admin.adminRegistration',['admin' => $this->admin, 'pass' => $this->pass]);
    }
}
