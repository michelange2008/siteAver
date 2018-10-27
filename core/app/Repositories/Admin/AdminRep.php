<?php

namespace App\Repositories\Admin;

use App\Models\Troupeau;

use App\Factories\Sousmenu\SousmenuFactory;
use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuCouleurs;

class AdminRep 
{
    public function boutons()
    {
        $boutons = new SousmenuFactory("boutons");
        $liste = [
            "Tous" => SousmenuCouleurs::VERT,
            "Eleveurs non vét san" => SousmenuCouleurs::GRIS,
            "Prophylo" => SousmenuCouleurs::BLEU,
            "VSO" => SousmenuCouleurs::BLEU,
            "" => SousmenuCouleurs::CLAIR,
            "BSA important" => SousmenuCouleurs::ORANGE,
            "BSA faits" => SousmenuCouleurs::VERT,
            "BSA en retard" => SousmenuCouleurs::ROUGE,
            "BSA non faits" => SousmenuCouleurs::BRIQUE,
        ];
        foreach($liste as $key => $value){
            $sousmenuItem = new SousmenuItem("#", $key, $value);
            $boutons->addSousmenuItem($sousmenuItem);
        }
        return $boutons;
    }
}