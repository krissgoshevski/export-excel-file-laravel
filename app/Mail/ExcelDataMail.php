<?php
// app/Mail/ExcelDataMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExcelDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rows;
    public $header;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rows, $header)
    {
        $this->rows = $rows;
        $this->header = $header;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.excel_data_mail')
                    ->subject('Excel Data Details Report');
    }
}
