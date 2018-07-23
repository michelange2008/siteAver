<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;

class Vetsan extends Blasons
{
    public function __construct($id_troupeau)
    {
        $this->identite = "vetsan";
        $this->icone_vrai = "vetsan_carre.svg";
        $this->icone_faux ="vetsan_no_carre.svg";
        $this->alt_vrai = "vetsan";
        $this->alt_faux = "non vetsan";
        $this->titre_vrai = "Nous sommes vétérinaires sanitaires de cet éleveur";
        $this->titre_faux = "Nous ne sommes pas vétérinaires sanitaires de cet éleveur";

        $troupeau = Troupeau::find($id_troupeau);
        $this->setCondition(boolval($troupeau->user->vetsan));
    }
    
}

