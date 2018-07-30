<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Factories\Sousmenu\SousmenuCouleurs;

class CardAnalyses extends Card
{
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);
        
        $this->setId('ANA');
        $this->setTitre("résultats d'analyses");
        $this->setIcone('analyses.svg');
        $this->setTexte("Présente les analyses de laboratoires de ".$this->troupeau->user->name);
        $this->setBouton('troupeau.analyses', "Voir", SousmenuCouleurs::VERT);
    }
}

