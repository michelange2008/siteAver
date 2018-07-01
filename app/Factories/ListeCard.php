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


    public function addCard($cardId, $titre, $icone, $texte)
    {
        $card = new CardFactory($titre, $icone, $texte);
        $this->listeCard[$cardId] = $card;
        
        return $this->listeCard;
    }
    
    public function addBouton($cardId, $routeBouton, $texteBouton, $couleurBouton, $bulleBouton)
    {
        $this->listeCard[$cardId]->addBouton($routeBouton, $texteBouton, $couleurBouton, $bulleBouton);
        
        return $this->listeCard;
        
    }
    
    public function addOption($cardId, $option)
    {
        $this->listeCard[$cardId]->addOption($option);
    }
    
    public function listeCard()
    {
        return $this->listeCard;
    }
}
