<?php
namespace app\Factories\Sceaux;

use App\Constantes\ConstSceaux;
use App\Factories\Sceaux\Sceau;

class SceauVetsan extends Sceau
{
    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);
        
        $this->identite = ConstSceaux::VETSAN_IDENTITE;
        $this->titre = ConstSceaux::VETSAN_TITRE;
        $this->affichage = true;
        
        if($this->troupeau->user->vetsan)
        {
            $this->icone = ConstSceaux::VETSAN_ICONE_VRAI;
            $this->texteAdmin = ConstSceaux::VETSAN_TEXT_ADMIN_VRAI.$this->troupeau->user->name;
            $this->texteUser = ConstSceaux::VETSAN_TEXT_USER_VRAI;
        }
        
        else
        {
            $this->icone = ConstSceaux::VETSAN_ICONE_FAUX;
            $this->texteAdmin = ConstSceaux::VETSAN_TEXT_ADMIN_FAUX.$this->troupeau->user->name;
            $this->texteUser = ConstSceaux::VETSAN_TEXT_USER_FAUX;
        }
        $this->setTexte();
    }
}

