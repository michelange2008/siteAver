<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Factories\Sousmenu\SousmenuCouleurs;

class CardFactures extends Card
{
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);
        
        $this->setId('FAC');
        $this->setTitre("factures");
        $this->setIcone('factures.svg');
        $this->setTexte("Toutes les factures des cinq dernières années");
        $this->setBouton('troupeau.factures');
        $this->setAffichage(false);
    }
}

