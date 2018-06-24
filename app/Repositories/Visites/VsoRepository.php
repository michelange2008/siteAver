<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Visites;

/**
 * Description of vsoRepository
 *
 * @author michel
 */
use App\Constantes\ConstAnimaux;

class VsoRepository
{
    use \App\Traits\PeriodeProphylo;
        
    public function cardEspeces()
    {
        $listeItem = [
            [
                'icone' => 'tete_tous.svg',
                'parametre' => ConstAnimaux::TS,
                'texte' => "Affiche toutes les espèces"
            ],
            [
                'icone' => 'tete_bovin.svg',
                'parametre' => ConstAnimaux::BV,
                'texte' => "N'affiche que les bovins"
            ],
            [
                'icone' => 'tete_ovin_caprin.svg',
                'parametre' => ConstAnimaux::PR,
                'texte' => "N'affiche que les petits ruminants"
            ],
            [
                'icone' => 'tete_Porc_volaille.svg',
                'parametre' => ConstAnimaux::BC,
                'texte' => "N'affiche que les porcs et les volailles"
            ]
        ];

        return $listeItem;
    }
}