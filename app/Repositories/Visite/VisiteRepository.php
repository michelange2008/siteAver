<?php

/*
 * Classe pour la gestion des éleveurs : vet san, prophylo, etc. en 
 * rapport avec VisiteController
 */

namespace App\Repositories\Visite;

/**
 * Description of VisiteRepository
 *
 * @author michel
 */
use App\Factories\ListeCard;

class VisiteRepository
{
    
    public function itemVetsan()
    {
        $listeItem =  new ListeCard();
        $listeItem->addCard('à définir', 'ask.svg', null);
        $listeItem->addCard('non', 'no.svg', 0);
        $listeItem->addCard('oui', 'yes.svg', 1);
        
        return $listeItem;
    }
}
