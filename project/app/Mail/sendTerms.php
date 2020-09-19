<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendTerms extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        //
        $this->name = $name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // return $this->view('view.name');
       return $this->from('pratiklathiya39@gmail.com')
                    ->view('admin.Mail.SendTerms')  
                    ->subject("You've got the Terms and Condition")
                    ->replyTo('Pratiklathiya39@gmail.com', 'pratik Lathiya');
        //  return $this->from('hello@allearthy.com')->view('mail.UserSend')->subject('Successfully Register');
    }
}
