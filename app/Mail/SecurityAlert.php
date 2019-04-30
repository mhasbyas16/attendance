<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SecurityAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nm,$email,$sub)
    {
        $this->nm=$nm;
        $this->email=$email;
        $this->sub=$sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hasby.ash@ib-synergy.co.id')->view('email.reset')->with([
            'nm' => $this->nm, 'sub'=>$this->sub, 'email'=>$this->email
        ]);
    }
}
