<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class otpEmails extends Mailable
{
    Public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hidroponikapps@gmail.com','Hidroponik@ta2020.xyz')->subject('OTP Request ['.$this->data['data'].']')->markdown('Emails.Otp')->with('data',$this->data);
    }
}
