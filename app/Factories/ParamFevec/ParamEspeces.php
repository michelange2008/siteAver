<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\ParamFevec;

/**
 * Description of ParamEspeces
 *
 * @author michel
 */

use App\Factories\ParamFevec\I_ParamFevec;
use App\Factories\ParamFevec\ParamFactory;
use App\Models\Especes;

class ParamEspeces implements I_ParamFevec
{
    protected $liste;
    
    public function __construct()
    {
        $this->liste = $this->creeListe();
    }
    
    public function creeListe()
    {
        return Especes::all();
    }
        public function liste()
    {
        return $this->liste;
    }

}
