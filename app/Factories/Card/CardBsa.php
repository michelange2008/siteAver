<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Models\Bsa;
use App\Constantes\ConstCards;
use App\Factories\Sousmenu\SousmenuCouleurs;

class CardBsa extends Card
{
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);
        $this->setOption($this->nbBsa($id_troupeau));
        $this->id = ConstCards::BSA_ID;
        $this->titre = ConstCards::BSA_TITRE;
        $this->icone = ConstCards::PATH_ICONES.ConstCards::BSA_ICONE;
        $this->texte = ConstCards::BSA_TEXTE;
        $this->setBouton(ConstCards::BSA_BOUTON);
    }
    
    public function nbBsa($id_troupeau)
    {
        return Bsa::where('troupeau_id', $id_troupeau)->count();
    }
    
    public function dateDernierBsa($id_troupeau)
    {
        return BSA::where('troupeau_id', $id_troupeau)->get()->sortByDesc('date_bsa')->first();
    }
}

