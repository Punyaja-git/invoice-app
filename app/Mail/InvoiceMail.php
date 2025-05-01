<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice; // Property to hold the invoice data

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Invoice $invoice
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice; // Pass invoice data to the mailable class
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Use the 'emails.invoice' view to build the email
        return $this->view('emails.invoice')
                    ->subject('Your Invoice')
                    ->with(['invoice' => $this->invoice]);
    }
}
