<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FurchaseConfim extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $all_product_sent="";
    public function __construct($Ordel_detailsss)
    {
        $this->all_product_sent=$Ordel_detailsss;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order_comfirm',[
                "alll_product_show" =>$this->all_product_sent
               ]);
    }
}
