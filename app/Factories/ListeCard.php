<?php

/*
 * Classe permettant de créer une suite de Card et de la renvoyer
 */

namespace App\Factories;

/**
 * Description of ListeCard
 *
 * @author michel
 */
use App\Factories\CardFactory;

class ListeCard
{
    protected $listeCard;
    
    public function __construct()
    {
        $this->listeCard = [];
    }


    public function addCard($titre, $icone, $texte)
    {
        $card = new CardFactory($titre, $icone, $texte);
        $this->listeCard[] = $card;
        
        return $this->listeCard;
    }
    
    public function listeCard()
    {
        return $this->listeCard;
    }
}
