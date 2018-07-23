<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;


class Prophylo extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) 
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'prophylo';
        $this->icone_vrai = 'prophylo_carre.svg';
        $this->icone_faux = 'prophylo_no_carre.svg';
        $this->alt_vrai = 'prophylo';
        $this->alt_faux = 'non prophylo';
        $this->titre_vrai = 'Prophylo à faire pour cette campagne';
        $this->titre_faux = 'Pas de prophylo à faire cette année';
        
        $prophylos= $troupeau->anneeprophylos->sortByDesc('debut');
        if(isset($prophylos[0]) && $prophylos[0]->campagne == $this->campagne()){
            $this->setCondition(true);
        }else{
            $this->setCondition(false);
        }
    }
}

