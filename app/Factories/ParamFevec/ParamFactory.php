<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\ParamFevec;

/**
 * Description of ParamFactory
 *
 * @author michel
 */
use App\Factories\ParamFevec\I_ParamFevec;

class ParamFactory
{
    protected $titre;
    protected $abbreviation;
    protected $icone;
    protected $liste;
    
    public function __construct($titre, $abbreviation, $icone, I_ParamFevec $liste)
    {
        $this->titre = $titre;
        $this->abbreviation = $abbreviation;
        $this->icone = $icone;
        $this->liste = $liste;
    }
    public function abbreviation()
    {
        return $this->abbreviation;
    }
    
    public function icone()
    {
        return $this->icone;
               
    }
    public function titre()
    {
        return $this->titre;
    }
    public function liste()
    {
        return $this->liste;
    }
}
