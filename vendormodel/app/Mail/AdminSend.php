<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminSend extends Mailable
{
    use Queueable, SerializesModels;
     public $vendor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $info = $this->vendor;
       // return $this->from('learnhunter@gmail.com')->view('mail.invoice',compact('info'))->subject('Successfully Buy product');
       // return $this->view('view.name');
         return $this->from('pratik-703c65@inbox.mailtrap.io','All Earthy')->view('mail.AdminSend',compact('info'))->subject("All Earthy - New Registration arrived")->replyTo('pratik-703c65@inbox.mailtrap.io', 'Pratik Lathiya');
         

    }
}
