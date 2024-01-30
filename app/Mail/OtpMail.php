<?php
// app/Mail/OtpMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
use Queueable, SerializesModels;

public $otp;

/**
* Create a new message instance.
*
* @param  string  $otp
* @return void
*/
public function __construct($otp)
{
$this->otp = $otp;
}

/**
* Build the message.
*
* @return $this
*/
public function build()
{
return $this->subject('Your OTP for Email Verification')
->from('phritik313@gmail.com') // Set the "From" address
->view('emails.otp');
}
}
