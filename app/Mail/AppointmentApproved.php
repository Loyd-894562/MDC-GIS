<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class AppointmentApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment; // Change to public property

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment-approved',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

