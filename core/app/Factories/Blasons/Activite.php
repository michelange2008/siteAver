<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Constantes\ConstBlasons;

class Activite extends Blasons
{

    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        $this->identite = ConstBlasons::ACTIVITE_IDENTITE;
        $this->titre = ConstBlasons::ACTIVITE_TITRE;
        $this->alt = ConstBlasons::ACTIVITE_ALT;
        $this->texteAdmin = ConstBlasons::ACTIVITE_TEXT;
        $this->affichage = true;
        
        if($troupeau->user->activite->nom === "Convention")
        {
            $this->icone = ConstBlasons::ACTIVITE_ICONE_CONV;
        }
        
        elseif($troupeau->user->activite->nom === "Suivi")
        {
            $this->icone = ConstBlasons::ACTIVITE_ICONE_SUIV;
        }
        
        elseif($troupeau->user->activite->nom === "VetoSan")
        {
            $this->icone = ConstBlasons::ACTIVITE_ICONE_SUIV;
        }
    }
}

