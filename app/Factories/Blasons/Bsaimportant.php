<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;
use App\Constantes\ConstBlasons;

class Bsaimportant extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $this->identite = ConstBlasons::BSAIMP_IDENTITE;
        $this->titre = ConstBlasons::BSAIMP_TITRE;
        $this->affichage = true;
        
        if($troupeau->user->vetsan)
        {
            $this->icone = ConstBlasons::BSAIMP_ICONE_VRAI;
            $this->alt = ConstBlasons::BSAIMP_ALT_VRAI;
            $this->texteAdmin = ConstBlasons::BSAIMP_TEXT_ADMIN_VRAI.$troupeau->user->name;
            $this->texteUser = ConstBlasons::BSAIMP_TEXT_USER_VRAI.$this->dateActuelle()->year;
        }
        
        else
        {
            $this->icone = ConstBlasons::BSAIMP_ICONE_FAUX;
            $this->alt = ConstBlasons::BSAIMP_ALT_FAUX;
            $this->texteAdmin = ConstBlasons::BSAIMP_TEXT_ADMIN_FAUX.$troupeau->user->name;
            $this->texteUser = ConstBlasons::BSAIMP_TEXT_USER_FAUX.$this->dateActuelle()->year;
        }
    }
}

