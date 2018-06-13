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
use App\Models\Troupeau;
use App\Models\Anneeprophylo_troupeau;
use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Constantes\ConstAnimaux;

class ProphyloRepository
{
    public function itemProphylo()
    {
        $route = 'prophylo.changer';
        $texte = 'Modifier La situation des éleveurs vis-à-vis de la prophylaxie';
        $listCard = [
            [
                'id' => 1,
                'titre' => ConstAnimaux::BV_long,
                'icone' => 'tete_bovin.svg',
                'texte' => $texte,
                'couleur' => SousmenuCouleurs::NAVY,
                'parametre' => ConstAnimaux::BV,
            ],
            [
                'id' => 2,
                'titre' => ConstAnimaux::PR_long,
                'icone' => 'tete_ovin_caprin.svg',
                'texte' => $texte,
                'couleur' => SousmenuCouleurs::GOLD,
                'parametre' => ConstAnimaux::PR,
            ],
            [
                'id' => 3,
                'titre' => ConstAnimaux::BC_long,
                'icone' => 'tete_Porc_volaille.svg',
                'texte' => $texte,                
                'couleur' => SousmenuCouleurs::ROSE,
                'parametre' => ConstAnimaux::BC,
            ]
        ];
        $listeItem = new ListeCard();
        
        foreach($listCard as $card)
        {
            $listeItem->addCard($card['id'], $card['titre'], $card['icone'], $card['texte']);
            $listeItem->addBouton($card['id'], $route, $card['titre'], $card['couleur'], $card['texte']);
            $listeItem->addOption($card['id'], $card['parametre']);
        }

        return $listeItem;
    }
    
    public function ajouteProphylo($datas)
    {
        $nbAjout = 0;
        foreach ($datas as $data)
        {
            $anneeprophylos_id = explode("_", $data)[0];
            $troupeaux_id = explode("_", $data)[1];
            
            $ligne = Anneeprophylo_troupeau::where('anneeprophylo_id', $anneeprophylos_id)
                                        ->where('troupeau_id', $troupeaux_id)
                                        ->get();
            if(count($ligne) === 0) 
            {
                $troupeau = Troupeau::find($troupeaux_id);
                $troupeau->anneeprophylos()->attach($anneeprophylos_id);
                $nbAjout++;
            }
        }
        return $nbAjout;
    }
    
    public function enleveProphylo($datas, $groupe)
    {
        $nbSuppr = 0;
        $anneeprophylo_troupeau = Anneeprophylo_troupeau::all();
        foreach ($anneeprophylo_troupeau as $ligne)
        {
            $synthese = $ligne->anneeprophylo_id."_".$ligne->troupeau_id;
            $troupeau = Troupeau::find($ligne->troupeau_id);
             /*si le troupeau est dans le groupe à modifier 
              * et qu'il n'est pas dans le tableau renvoyé il faut le supprimer
              */
            if($troupeau->especes->groupe === $groupe && !in_array($synthese, $datas))
            {
                $troupeau->anneeprophylos()->detach($ligne->anneeprophylo_id);
                $nbSuppr++;
            }
        }
        return $nbSuppr;
    }
}
