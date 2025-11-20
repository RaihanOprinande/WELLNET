<?php

namespace App\Mail;

use App\Models\UserChildren;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class ChildVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $child;
    public $token;
    public $verificationLink;

    /**
     * Create a new message instance.
     */
    public function __construct(UserChildren $child, $token)
    {
        $this->child = $child;
        $this->token = $token;
        $this->verificationLink = url('http://localhost:8000/api/auth/verify-email/' . $token);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verifikasi akun anda'. $this->child->username,
        );
    }

        public function build()
    {
        return $this->view('emails.verify-email')
                    ->subject('Verify Your Email Address');
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.child-verification', // View baru
    //         with: ['username' => $this->child->username, 'verificationUrl' => $this->verificationUrl],
    //     );
    // }

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
