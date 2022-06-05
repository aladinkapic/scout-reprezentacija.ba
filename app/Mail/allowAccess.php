<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class allowAccess extends Mailable{
    use Queueable, SerializesModels;
    public $_mail, $_name, $_password;

    /**
     * Create a new message instance.
     *
     * @param $mail
     * @param $name
     * @param $_password
     */
    public function __construct($mail, $name, $_password){
        $this->_name = $name;
        $this->_mail = $mail;
        $this->_password = $_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject($this->subject)->markdown('system.layout.emails.send-email');
    }
}
