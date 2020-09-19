<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailtrap extends Mailable
{
    use Queueable, SerializesModels;
    public $Emailotp;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Emailotp ,$name)
    {
        $this->Emailotp = $Emailotp;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pratiklathiya39@gmail.com')
        ->view('mail.EmailOTP')  
        ->subject('Email One Time Password');
    }
}
