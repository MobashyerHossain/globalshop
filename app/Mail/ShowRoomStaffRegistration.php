<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowRoomStaffRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;
    public $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($staff, $pass)
    {
        $this->staff = $staff;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.showroom.showRoomStaffRegistration',['staff' => $this->staff, 'pass' => $this->pass]);
    }
}
