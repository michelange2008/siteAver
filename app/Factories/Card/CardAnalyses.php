<?php
namespace app\Factories\Card;

use App\Factories\Card\Card;
use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Constantes\ConstCards;
use App\Factories\Analyses\AnalyseMetadatas;


class CardAnalyses extends Card
{
    use AnalyseMetadatas;
    
    public function __construct($id_troupeau){
        parent::__construct($id_troupeau);

        $nbAnalyses = $this->nbAnalysesSelonId($id_troupeau);
        
        $this->id = ConstCards::ANA_ID;
        $this->titre = ConstCards::ANA_TITRE;
        $this->icone = ConstCards::ANA_ICONE;
        $this->setBouton(ConstCards::ANA_BOUTON);
    
        if($nbAnalyses > 0)
        {
            $this->texte = ConstCards::ANA_TEXTE_OUI;
            $this->setOption($nbAnalyses);
        }
        else
        {
            $this->texte = ConstCards::ANA_TEXTE_NON;
        }
    }
}
