<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Models\Bsa;

class CardBsa extends Card
{
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);
        $this->setOption($this->nbBsa($id_troupeau));
        $this->setId('BSA');
        $this->setTitre("bilans sanitaires annuels");
        $this->setIcone('bsa.svg');
        $this->setTexte("Toutes les dates des bilans sanitaires et les protocoles de soin");
        $this->setBouton('troupeau.bsa');
    }
    
    public function nbBsa($id_troupeau)
    {
        return Bsa::where('troupeau_id', $id_troupeau)->count();
    }
}

