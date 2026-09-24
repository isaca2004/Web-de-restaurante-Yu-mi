<?php

namespace App\Mail;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaReserva extends Mailable
{
    use Queueable, SerializesModels;
    //La reserva que se acaba de crear. Se guarda aqui 
    //Para poder usarla luego dentro de la vista del email.
    public Reserva $reserva;

    /**
     * Create a new message instance.
     */
    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    //Define el asunto del email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Reserva: ' . $this->reserva->date . ' ' . $this->reserva->time,
        );
    }

    //Define que vista Blade se usa como contenido, y que datos le pasamos
    public function content(): Content
    {
        return new Content(
            view: 'emails.nueva-reserva',
            with: ['reserva' => $this->reserva],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
