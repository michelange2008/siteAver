<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;
use App\Constantes\ConstBlasons;
use Carbon\Carbon;

class VsoBlason extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) {
        $troupeau = Troupeau::find($id_troupeau);

        
        $vsos= $troupeau->vsoafaire->sortByDesc('annee');
        
       $this->identite = ConstBlasons::VSO_IDENTITE;
       $this->titre = ConstBlasons::VSO_TITRE;
       
        if($troupeau->user->vetsan)
        {
            if($vsos->first() !== null && $vsos->first()->annee == $this->dateActuelle()->year)
            {
                $this->icone = ConstBlasons::VSO_ICONE_VRAI;
                $this->alt = ConstBlasons::VSO_ALT_VRAI;
                $this->texteAdmin = ConstBlasons::VSO_TEXT_ADMIN_VRAI.$troupeau->user->name;
                $this->texteUser = ConstBlasons::VSO_TEXT_USER_VRAI.$this->dateActuelle();
            }
            else
            {
                $this->icone = ConstBlasons::VSO_ICONE_FAUX;
                $this->alt = ConstBlasons::VSO_ALT_FAUX;
                $this->texteAdmin = ConstBlasons::VSO_TEXT_ADMIN_FAUX.$troupeau->user->name;
                $this->texteUser = ConstBlasons::VSO_TEXT_USER_FAUX.$this->dateActuelle();
            }
        }
        else
        {
            $this->affichage = false;
        }
    }
}

