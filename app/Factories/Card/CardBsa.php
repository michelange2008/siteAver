<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Factories\Sousmenu\SousmenuCouleurs;

class CardBsa extends Card
{
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);
        
        $this->setId('BSA');
        $this->setTitre("bilans sanitaires annuels");
        $this->setIcone('bsa.svg');
        $this->setTexte("Toutes les dates des bilans sanitaires réalisés et les protocoles de soin correspondant");
        $this->setBouton('troupeau.bsa');
    }
}

