<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // return $this->view('view.name');
         return $this->from('pratik-703c65@inbox.mailtrap.io','All Earthy')->view('mail.UserSend')->subject("All Earthy - You've Successfully Registered")->replyTo('pratik-703c65@inbox.mailtrap.io', 'Pratik Lathiya');
    }
}
