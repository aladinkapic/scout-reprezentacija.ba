<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestartPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $_mail, $_name, $_gender, $_username, $_api_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $name, $gender, $username, $api_token){
        $this->_mail = $mail;
        $this->_name = $name;
        $this->_gender = $gender;
        $this->_username = $username;
        $this->_api_token = $api_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject('Pristupni podaci')->markdown('system.layout.emails.restart-password');
    }
}
