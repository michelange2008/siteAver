<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;

class Vso extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'vso';
        $this->icone_vrai= 'vso_carre.svg';
        $this->icone_faux= 'vso_no_carre.svg';
        $this->alt_vrai = 'vso';
        $this->alt_faux = 'pas de vso';
        $this->titre_vrai = 'VSO à faire cette année';
        $this->titre_faux = 'Pas de VSO à faire';
        
        $vsos= $troupeau->anneevso->sortByDesc('debut');
        if(isset($vsos->values()[0]) && $vsos->values()[0]->campagne == $this->campagne())
        {
            $this->setCondition(true);
        }else{
            $this->setCondition(false);
        }
        
    }
}

