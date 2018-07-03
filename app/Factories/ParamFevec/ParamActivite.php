<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\ParamFevec;

/**
 * Description of ParamActivite
 *
 * @author michel
 */

use App\Factories\ParamFevec\I_ParamFevec;
use App\Factories\ParamFevec\ParamFactory;
use App\Models\Activite;


class ParamActivite implements I_ParamFevec
{
    protected $liste;
    
    public function __construct()
    {
        $this->liste = $this->creeListe();
    }
    public function creeListe(){
        return Activite::all();
    }
    
    public function liste()
    {
        return $this->liste;
    }
}
