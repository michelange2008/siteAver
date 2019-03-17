<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToAntikor extends Mailable
{
    use Queueable, SerializesModels;

    public $troupeau;
    public $titre;
    public $contenu;
    /**
     * Create a new contenu instance.
     *
     * @return void
     */
    public function __construct($troupeau, $titre, $contenu)
    {
        $this->troupeau = $troupeau;
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    /**
     * Build the contenu.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->titre)
                    ->view('aver.admin.mailToAntikor', [
                        'troupeau' => $this->troupeau,
                        'titre' => $this->titre,
                        'contenu' => $this->contenu,
        ]);
    }
}
