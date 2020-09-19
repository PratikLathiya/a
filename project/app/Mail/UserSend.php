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
         return $this->from('pratiklathiya39@gmail.com','All Earthy')->view('mail.UserSend')->subject("All Earthy - You've Successfully Registered")->replyTo('pratiklathiya39@gmail.com', 'Pratik Lathiya');
    }
}
