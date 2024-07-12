<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope; // Add this import
use Illuminate\Mail\Mailables\Content;  // Add this import

class CVStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cv;
    public $status;
    public $user; // Add user property

    public function __construct($cv, $status, $user) // Add user parameter
    {
        $this->cv = $cv;
        $this->status = $status;
        $this->user = $user; // Initialize user property
    }

    public function build()
    {
        return $this->subject('Your CV Status')
                    ->view('emails.cv_status');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'CV Status Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.cv_status',
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
