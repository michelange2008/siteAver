<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;

class Bsaimportant extends Blasons
{
    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'bsaimportant';
        $this->icone_vrai = 'bsaimportant_carre.svg';
        $this->icone_faux = 'bsaimportant_no_carre.svg';
        $this->alt_vrai = 'bsa important';
        $this->alt_faux = 'bsa nom important';
        $this->titre_vrai = 'BSA à faire impérativement';
        $this->titre_faux = 'BSA non impératif';
        
        $this->setCondition(boolval($troupeau->bsaimportant));
    }
}

