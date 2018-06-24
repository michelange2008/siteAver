<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Visites;

/**
 * Fait le boulot pout le VisitesCOntroller
 *
 * @author michel
 */
use App\Factories\ListeCard;
use App\Factories\CardFactory;
use App\Factories\Sousmenu\SousmenuCouleurs;

class VisitesRepository
{
    public function visitesCard()
    {
       $texteBouton = 'On y va !';
       $bulleBouton = 'cliquer pour suivre le lien';
        $liste = [
            [
                'cardId' => 1,
                'titre' => 'Vétérinaire sanitaire',
                'icone' => 'vetsan.svg',
                'texte' => "Définit de quels éleveurs nous sommes vétérinaires sanitaires. Attribue automatiquement aux éleveurs en convention",
                'routeBouton' => 'vetsan.changer',
                'couleurBouton' => SousmenuCouleurs::VERT,
            ],
            [
                'cardId' => 2,
                'titre' => 'prophylaxies',
                'icone' => 'prophylo.svg',
                'texte' => "Gestion des prophylaxies: ajout ou suppression d'éleveurs, ajouts automatiques, ...",
                'routeBouton' => 'prophylo.index',
                'couleurBouton' => SousmenuCouleurs::ROUGE,
            ],
            [
                'cardId' => 3,
                'titre' => 'bilans sanitaires annuels',
                'icone' => 'bsa.svg',
                'texte' => "Affiche les dates des derniers bilans sanitaires et de ceux à faire",
                'routeBouton' => 'bsa.index',
                'couleurBouton' => SousmenuCouleurs::NAVY,
            ],
            [
                'cardId' => 4,
                'titre' => 'visites obligatoires',
                'icone' => 'vso.svg',
                'texte' => "Affiche les éleveurs chez qui on doit faire les visites obligatoires et permet des modifications, ...",
                'routeBouton' => 'vso.index',
                'couleurBouton' => SousmenuCouleurs::GOLD,
            ],
        ];
        $listeCard = new ListeCard();
        foreach ($liste as $card)
        {
            $listeCard->addCard($card['cardId'], $card['titre'], $card['icone'], $card['texte']);
            $listeCard->addBouton($card['cardId'], $card['routeBouton'], $texteBouton, $card['couleurBouton'], $bulleBouton);
        }
        return $listeCard;
    }
}
