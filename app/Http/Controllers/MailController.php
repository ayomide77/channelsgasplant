<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $receiptno;

    
    public function __construct($data,$receiptno)
    {
        $this->data = $data;
        $this->receiptno = $receiptno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $address = 'admin@chnlsgasplant.com';
        $subject = 'Channels Gas Plant - Order Received';
        $name = 'Sales Department';

        return $this->view('emails.SendEmailReceipt')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'orderdata' => $this->data,'receiptno'=> $this->receiptno]);
    }
    
}
