<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $maildata;
    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mail.InvoiceMail')->subject('Invoice for bpm-pro')->with('maildata', $this->maildata);
        $path = 'https://excellis.co.in/bpm_pro/public/storage/invoice/';
        
        return $this->view('mail.InvoiceMail')
            ->subject('Invoice for bpm-pro')
            ->attach($path.$this->maildata['pdf_file']);

        
    }
}
