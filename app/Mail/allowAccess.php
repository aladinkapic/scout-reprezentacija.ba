<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class allowAccess extends Mailable{
    use Queueable, SerializesModels;
    public $_mail, $_name, $_username, $_password, $_gender;

    /**
     * Create a new message instance.
     *
     * @param $mail
     * @param $name
     * @param $password
     * @param $gender
     */
    public function __construct($mail, $name, $_username, $password, $gender){
        $this->_name = $name;
        $this->_username = $_username;
        $this->_mail = $mail;
        $this->_password = $password;
        $this->_gender = $gender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject('Pristupni podaci')->markdown('system.layout.emails.allow-access');
    }
}
