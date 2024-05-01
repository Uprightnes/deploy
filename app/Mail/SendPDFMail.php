<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendPDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.sendmail')
                    ->attachData($this->generatePDF(), 'filename.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }

    private function generatePDF()
{
    // You can customize the PDF view and pass data to it
    $pdf = PDF::loadView('emails.pdf_template', ['data' => $data]);

    // You can also set additional options like paper size, orientation, etc.
    $pdf->setPaper('A4', 'portrait');

    // Optionally, you can save the PDF to a file before attaching it to the email
    $pdf->save(storage_path('app/public/filename.pdf'));

    // Return the PDF content as a string
    return $pdf->output();
}
}
