<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;

class Vetsan extends Blasons
{
    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = "vetsan";
        $this->icone_vrai = "vetsan_carre.svg";
        $this->icone_faux ="vetsan_no_carre.svg";
        $this->alt_vrai = "vetsan";
        $this->alt_faux = "non vetsan";
        $this->titre_vrai = "Antikor est vétérinaire sanitaire de ".$troupeau->user->name;
        $this->titre_faux = "Antikor n'est pas vétérinaires sanitaires de ".$troupeau->user->name;

        $this->setCondition(boolval($troupeau->user->vetsan));
    }
    
}

