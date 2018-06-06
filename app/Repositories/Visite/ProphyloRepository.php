<?php

/*
 * fournit les méthodes nécessaires pour la gestion des prophylaxies
 */

namespace App\Repositories\Visite;

/**
 * Description of ProphyloRepository
 *
 * @author michel
 */
use App\Factories\ListeCard;
use App\Models\Anneeprophylo;
use App\Models\Troupeau;

class ProphyloRepository
{
    public function itemProphylo()
    {
        $listeItem = new ListeCard();
        $listeItem->addCardAvecBouton('bovins', 'tete_bovin.svg', 'V', 'visite.changerProphyloBv', 'bovins', 'vert', 'changer les prophylaxies des éleveurs bovins');
        
        $listeItem->addCardAvecBouton('petits ruminants', 'tete_ovin_caprin.svg', 'O', 'visite.changerProphyloPr', 'petits ruminants', 'bleu', 'changer les prophylaxies des petits ruminants');
        $listeItem->addCardAvecBouton('autres', 'tete_porc_volaille.svg', 'A', 'visite.changerProphyloAutres', 'autres', 'rouge', 'changer les prophylaxies des autres especes');
        
        return $listeItem;
    }
    
    public function ajouteProphylo($anneeprophylos_id, $troupeaux_id)
    {
        $troupeau = Troupeau::find($troupeaux_id);
        $annee = Anneeprophylo::find($anneeprophylos_id);
        $troupeau->anneeprophylos()->update($annee);
        return $troupeau;
    }
}
