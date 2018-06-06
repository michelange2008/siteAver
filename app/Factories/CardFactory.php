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
use App\Factories\Sousmenu\SousmenuItem;

class CardFactory
{
    protected $titre;
    protected $icone;
    protected $texte;
    protected $bouton;


    public function __construct($titre, $icone, $texte = '', $bouton = null)
    {
        $this->titre = $titre;
        $this->icone = $icone;
        $this->texte = $texte;
        $this->bouton = $bouton;
    }
    
    public function addBouton($routeBouton, $texteBouton, $couleurBouton, $bulleBouton)
    {
        $bouton = new SousmenuItem($routeBouton, $texteBouton, $couleurBouton, $bulleBouton);
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
