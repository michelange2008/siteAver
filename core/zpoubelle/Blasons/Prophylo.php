<?php
namespace app\Factories\Blasons;

use App\Factories\Blasons\Blasons;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;
use App\Constantes\ConstBlasons;

class Prophylo extends Blasons
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) 
    {
        $troupeau = Troupeau::find($id_troupeau);
        
        $prophylo_recente = $troupeau->anneeprophylos->sortByDesc('debut');

        $this->identite = ConstBlasons::PROPHYLO_IDENTITE;
        $this->titre = ConstBlasons::PROPHYLO_TITRE;
        $this->affichage = true;
        
        if($troupeau->user->vetsan)
        {
            if(!$prophylo_recente->isEmpty() && $prophylo_recente->first()->campagne === $this->campagne())
            {
                $this->icone = ConstBlasons::PROPHYLO_ICONE_VRAI;
                $this->alt = ConstBlasons::PROPHYLO_ALT_VRAI;
                $this->texteAdmin = ConstBlasons::PROPHYLO_TEXT_ADMIN_VRAI.$troupeau->user->name;
                $this->texteUser = ConstBlasons::PROPHYLO_TEXT_USER_VRAI.$this->campagne();
            }
            else
            {
                $this->icone = ConstBlasons::PROPHYLO_ICONE_FAUX;
                $this->alt = ConstBlasons::PROPHYLO_ALT_FAUX;
                $this->texteAdmin = ConstBlasons::PROPHYLO_TEXT_ADMIN_FAUX.$troupeau->user->name;
                $this->texteUser = ConstBlasons::PROPHYLO_TEXT_USER_FAUX.$this->campagne();
            }
        }
        else
        {
            $this->affichage = false;
        }
    }
}

