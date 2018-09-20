<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\Sceaux;

/**
 * Description of SceauActivite
 *
 * @author michel
 */

use App\Constantes\ConstSceaux;
use App\Models\Troupeau;

class SceauActivite extends Sceau
{
    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);
        
        $this->identite = ConstSceaux::ACTIVITE_IDENTITE;
        $this->titre = ConstSceaux::ACTIVITE_TITRE;
        $this->texteAdmin = ConstSceaux::ACTIVITE_TEXT_ADMIN;
        $this->texteUser = ConstSceaux::ACTIVITE_TEXT_USER;
        $this->setTexte();
        
        if(!$this->troupeau->user->vetsan)
        {
            $this->affichage = false;
        }
        
        if($this->troupeau->user->activite->nom === "Convention")
        {
            $this->icone = ConstSceaux::ACTIVITE_ICONE_CONV;
        }
        
        elseif($this->troupeau->user->activite->nom === "Suivi")
        {
            $this->icone = ConstSceaux::ACTIVITE_ICONE_SUIV;
        }
        
        elseif($this->troupeau->user->activite->nom === "VetoSan")
        {
            $this->icone = ConstSceaux::ACTIVITE_ICONE_SANI;
        }
    }
}
