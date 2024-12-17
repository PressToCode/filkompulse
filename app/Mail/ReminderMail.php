<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientName;
    public $messages;
    public $reminderTime;

    /**
     * Create a new message instance.
     */
    public function __construct($recipientName, $message, $reminderTime)
    {
        $this->recipientName = $recipientName;
        $this->messages = $message;
        $this->reminderTime = $reminderTime;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('filkompulse@example.com', 'Filkom Pulse'),
            subject: 'Reminder Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reminder',
            with: [
                'recipientName' => $this->recipientName,
                'message' => $this->messages,
                'reminderTime' => $this->reminderTime,
            ],
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
