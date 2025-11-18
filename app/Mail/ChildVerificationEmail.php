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
    public $verificationUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(UserChildren $child)
    {
        $this->child = $child;

        // --- 1. Buat Signed URL ---
        // 'child.verify.deep_link' adalah nama route yang akan kita definisikan di routes/web.php
        $this->verificationUrl = URL::temporarySignedRoute(
            'child.verify.deep_link', // Nama route
            now()->addMinutes(60), // Link kedaluwarsa dalam 60 menit
            [
                'id' => $child->id,
                'hash' => sha1($child->email), // Verifikasi hash (seperti bawaan Laravel)
            ]
        );
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

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.child-verification', // View baru
            with: ['username' => $this->child->username, 'verificationUrl' => $this->verificationUrl],
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
