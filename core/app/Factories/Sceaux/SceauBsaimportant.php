<?php
namespace app\Factories\Sceaux;

use App\Factories\Sceaux\Sceau;
use App\Constantes\ConstSceaux;
use App\Traits\PeriodeProphylo;

class SceauBsaimportant extends Sceau
{
    use PeriodeProphylo;

    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);
        
        $this->identite = ConstSceaux::BSAIMP_IDENTITE;
        $this->titre = ConstSceaux::BSAIMP_TITRE;
        $this->type = ConstSceaux::TYPE_INFO;
        
        if($this->troupeau->bsaimportant)
        {
                $this->icone = ConstSceaux::BSAIMP_ICONE_VRAI;
                $this->texteAdmin = ConstSceaux::BSAIMP_TEXT_ADMIN_VRAI.$this->campagne();
                $this->texteUser = ConstSceaux::BSAIMP_TEXT_USER_VRAI.$this->campagne();
        }
        else
        {
            $this->icone = ConstSceaux::BSAIMP_ICONE_FAUX;
            $this->texteAdmin = ConstSceaux::BSAIMP_TEXT_ADMIN_FAUX.$this->campagne();
            $this->texteUser = ConstSceaux::BSAIMP_TEXT_USER_FAUX.$this->campagne();
        }
        $this->setTexte();
    }
}

