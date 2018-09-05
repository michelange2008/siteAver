<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;


class VsoBlason extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'vso';
        $this->icone_vrai= 'vso_carre.svg';
        $this->icone_faux= 'vso_no_carre.svg';
        $this->alt_vrai = 'vso';
        $this->alt_faux = 'pas de vso';
        $this->titre_vrai = 'Visite Sanitaire Obligatoire à faire en '.$this->campagne();
        $this->titre_faux = 'Pas de Visite Sanitaire Obligatoire en '.$this->campagne();
        
        $vsos= $troupeau->vsoafaire->sortByDesc('annee');
        if($vsos->first() !== null && $vsos->first()->annee == $this->dateActuelle()->year)
        {
            $this->setCondition(true);
        }else{
            $this->setCondition(false);
        }
        
    }
}

