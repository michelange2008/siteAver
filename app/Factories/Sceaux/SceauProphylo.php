<?php
namespace App\Factories\Sceaux;

use App\Factories\Sceaux\Sceau;
use App\Constantes\ConstSceaux;
use App\Traits\PeriodeProphylo;

class SceauProphylo extends Sceau
{
    use PeriodeProphylo;

    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);
        
        $this->identite = ConstSceaux::PROPHYLO_IDENTITE;
        $this->titre = ConstSceaux::PROPHYLO_TITRE;
        $this->type = ConstSceaux::TYPE_INFO;
        
        $prophylo = $this->troupeau->anneeprophylos->sortByDesc('debut');
        
        if($this->troupeau->user->vetsan)
        {
            if(!$prophylo->isEmpty() && $prophylo->first()->campagne === $this->campagne())
            {
                $this->icone = ConstSceaux::PROPHYLO_ICONE_VRAI;
                $this->texteAdmin = ConstSceaux::PROPHYLO_TEXT_ADMIN_VRAI.$this->campagne();
                $this->texteUser = ConstSceaux::PROPHYLO_TEXT_USER_VRAI.$this->campagne();
            }
            else
            {
                $this->icone = ConstSceaux::PROPHYLO_ICONE_FAUX;
                $this->texteAdmin = ConstSceaux::PROPHYLO_TEXT_ADMIN_FAUX.$this->campagne();
                $this->texteUser = ConstSceaux::PROPHYLO_TEXT_USER_FAUX.$this->campagne();
            }
            $this->setTexte();
        }
        else
        {
            $this->affichage = false;
        }
    }
}

