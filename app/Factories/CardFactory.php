<?php

/*
 * Classe pour faire des cards à afficher avec titre et icone;
 */

namespace App\Factories;

/**
 * Description of CardFactory
 *
 * @author michel
 */
class CardFactory
{
    protected $titre;
    protected $icone;
    protected $texte;
    protected $bouton;


    public function __construct($titre, $icone, $texte = '')
    {
        $this->titre = $titre;
        $this->icone = $icone;
        $this->texte = $texte;
    }
    
    public function addBouton($bouton)
    {
        $this->bouton = $bouton;
    }
    
    public function titre()
    {
        return $this->titre;
    }
    
    public function icone()
    {
        return $this->icone;
    }
    
    public function texte()
    {
        return $this->texte;
    }
    
    public function bouton()
    {
        return $this->bouton;
    }
}
