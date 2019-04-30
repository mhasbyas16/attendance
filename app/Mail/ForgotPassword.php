<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nm,$email,$newpass)
    {
        $this->nm = $nm;
        $this->newpass= $newpass;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hasby.ash@ib-synergy.co.id')->view('email.forgot')->with([
            'nm' => $this->nm, 'newpass' => $this->newpass, 'email'=> $this->email
        ]);
    }
}
