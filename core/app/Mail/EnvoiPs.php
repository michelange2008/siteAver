<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class EnvoiPs extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pdf;
    public $pdf_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $pdf, $pdf_name)
    {
        $this->user = $user;
        $this->pdf = $pdf;
        $this->pdf_name = $pdf_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->subject("Envoi d'un protocole de soin")
                    ->view('visites.envoiPs')
                    ->attachData($this->pdf, $this->pdf_name);
    }
}
