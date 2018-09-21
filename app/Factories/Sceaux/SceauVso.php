<?php
namespace App\Factories\Sceaux;

use App\Factories\Sceaux\Sceau;
use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;
use App\Constantes\ConstSceaux;
use phpDocumentor\Reflection\Types\Parent_;

class SceauVso extends Sceau
{
    use PeriodeProphylo;
    
    public function __construct($id_troupeau) {

        parent::__construct($id_troupeau);
        
        $vsos= $this->troupeau->vsoafaire->sortByDesc('annee');
        
       $this->identite = ConstSceaux::VSO_IDENTITE;
       $this->titre = ConstSceaux::VSO_TITRE;
       
        if($this->troupeau->user->vetsan)
        {
            if($vsos->first() !== null && $vsos->first()->annee == $this->dateActuelle()->year)
            {
                $this->icone = ConstSceaux::VSO_ICONE_VRAI;
                $this->texteAdmin = ConstSceaux::VSO_TEXT_ADMIN_VRAI.$this->troupeau->user->name;
                $this->texteUser = ConstSceaux::VSO_TEXT_USER_VRAI.$this->dateActuelle();
            }
            else
            {
                $this->icone = ConstSceaux::VSO_ICONE_FAUX;
                $this->texteAdmin = ConstSceaux::VSO_TEXT_ADMIN_FAUX.$this->troupeau->user->name;
                $this->texteUser = ConstSceaux::VSO_TEXT_USER_FAUX.$this->dateActuelle();
            }
        }
        else
        {
            $this->affichage = false;
        }
    }
}

