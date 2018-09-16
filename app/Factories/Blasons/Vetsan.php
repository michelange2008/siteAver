<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Constantes\ConstBlasons;

class Vetsan extends Blasons
{
    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = ConstBlasons::VETSAN_IDENTITE;
        $this->titre = ConstBlasons::VETSAN_TITRE;
        $this->affichage = true;
        
        if($troupeau->user->vetsan)
        {
            $this->icone = ConstBlasons::VETSAN_ICONE_VRAI;
            $this->alt = ConstBlasons::VETSAN_ALT_VRAI;
            $this->texteAdmin = ConstBlasons::VETSAN_TEXT_ADMIN_VRAI.$troupeau->user->name;
            $this->texteUser = ConstBlasons::VETSAN_TEXT_USER_VRAI;
        }
        
        else
        {
            $this->icone = ConstBlasons::VETSAN_ICONE_FAUX;
            $this->alt = ConstBlasons::VETSAN_ALT_FAUX;
            $this->texteAdmin = ConstBlasons::VETSAN_TEXT_ADMIN_FAUX.$troupeau->user->name;
            $this->texteUser = ConstBlasons::VETSAN_TEXT_USER_FAUX;
        }
    }
}

