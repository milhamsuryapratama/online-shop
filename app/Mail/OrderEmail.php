<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $transaction;
    private $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaction, $cart)
    {
        $this->transaction = $transaction;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order_email')
                ->with('transaction', $this->transaction)
                ->with('cart', $this->cart);
    }
}
