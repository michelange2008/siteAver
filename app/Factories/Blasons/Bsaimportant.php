<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;

class Bsaimportant extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'bsaimportant';
        $this->icone_vrai = 'bsaimportant_carre.svg';
        $this->icone_faux = 'bsaimportant_no_carre.svg';
        $this->alt_vrai = 'bsa important';
        $this->alt_faux = 'bsa nom important';
        $this->titre_vrai = 'Bilan sanitaire annuel à faire en '.$this->campagne();
        $this->titre_faux = 'Bilan sanitaire annuel non obligatoire en '.$this->campagne();
        
        $this->setCondition(boolval($troupeau->bsaimportant));
    }
}

