<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;

class Activite extends Blasons
{

    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = 'activite';
        $this->condition = true;
        $this->icone_vrai = $troupeau->user->activite->abbreviation.".svg";
        $this->icone_faux = '';
        $this->alt_vrai = $troupeau->user->activite->nom.".svg";
        $this->alt_faux = '';
        $this->titre_vrai = 'Eleveur en '.$troupeau->user->activite->nom;
        $this->titre_faux = '';
    }
}

