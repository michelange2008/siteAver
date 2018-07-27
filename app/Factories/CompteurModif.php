<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories;

/**
 * Objet pour compter les ajouts et suppressions
 *
 * @author michel
 */
use Illuminate\Support\Collection;

class CompteurModif
{
    protected $nbAjout;

    public function __construct($nbAjout = 0, $nbSuppr = 0)
    {
        $this->nbAjout = $nbAjout;
        $this->nbSuppr = $nbSuppr;
    }
    public function nbAjout()
    {
        return $this->nbAjout;
    }
    
    public function nbSuppr()
    {
        return $this->nbSuppr;
    }
    public function incrementAjout()
    {
        return $this->nbAjout++;
    }
    public function incrementSuppr()
    {
        return $this->nbSuppr++;
    }
    public function setNbAJout($nb)
    {
        $this->nbAjout = $nb;
    }
    public function setNbSuppr($nb)
    {
        $this->nbSuppr = $nb;
    }
    
}
