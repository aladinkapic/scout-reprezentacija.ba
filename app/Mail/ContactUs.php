<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $_subject, $_reply_to, $_reply_to_email, $_name, $_email, $_phone, $_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $message, $reason = null){
        // $this->_subject = $subject;
        // $this->_reply_to = $reply_to;
        // $this->_reply_to_email = $reply_to_email;
        $this->_name = $name;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_message = $message;
        $this->_reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject($this->subject)->markdown('system.layout.emails.contact-us');
    }
}
