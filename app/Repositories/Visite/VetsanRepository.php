<?php

/*
 * Classe pour la gestion des éleveurs : vet san,
 * rapport avec VisiteController
 */

namespace App\Repositories\Visite;

/**
 * Description of VisiteRepository
 *
 * @author michel
 */
use App\Factories\ListeCard;
use App\Models\User;

class VetsanRepository
{
    
    public function itemVetsan() // FOURNIT L OBJET POUR AFFICHER LES CARD DANS LA PAGE VETSAN
    {
        $listeItem =  new ListeCard();
        $listeItem->addCard(1,'oui', 'yes.svg', 1);
        $listeItem->addCard(2,'non', 'no.svg', 0);
        $listeItem->addCard(3, 'à définir', 'ask.svg', null);
        
        return $listeItem;
    }
    
    public function testSiAbsent($item) // ATTRIBUE FAUX POUR LA COLONNE VETSAN AUX ELEVEURS QUI NE SONT PAS DANS LA LISTE DU FORMULAIRE
    {
        $users = User::select('id')->get();
        foreach($users as $user){
            if(!in_array($user->id, $item))
            {
                $user->vetsan = 0;
                $user->save();
            }
        }
    }
        
    public function testSiPresent($liste)
    {
        foreach($liste as $value)
        {
            $user = User::findOrFail($value);
            $user->vetsan = 1;
            $user->save();
        }
    }
}
