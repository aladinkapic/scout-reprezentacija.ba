<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable{
    use Queueable, SerializesModels;
    public $_message, $_subject;

    /**
     * Create a new message instance.
     *
     * @param $message
     * @param $subject
     */
    public function __construct($message, $subject){
        $this->_message = $message;
        $this->_subject = $subject;
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
