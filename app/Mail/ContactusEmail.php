<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContactusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $message;

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
         
         $subject = 'Contact Us Message';
         $address = 'admin@chnlsgasplant.com';
         $name = $this->data['name'];
         $email = $this->data['email'];

         return $this->view('emails.SendContactusEmail')
         ->from($address, $name)
         ->replyTo($email, $name)
         ->subject($subject)
         ->with(['bodyMsg' => $this->data['message'],'bodyName'=>$this->data['name'],'bodyEmail'=>$this->data['email']]);
         }
    
}
