<?php
/* 
 * Fabrication des boutons pour les menus
 * L'interface SousmenuObjet est prévue en cas de création d'autres classes du même type que celle-ci
 * la variable parametre est facultative et correspond aux routes ayant une partie variable
 * de type site/user/{parametre}
 * 
 * Fonctionne avec la classe SousmenuFactory destinée à faire une liste de SousmenuItem
 */
namespace App\Factories\Sousmenu;

use App\Factories\Sousmenu\SousmenuCouleurs;

class SousmenuItem extends SousmenuObjet
{

    protected $route;
    protected $parametre;
    protected $texte;
    protected $couleur;
    protected $bulle;

    public function __construct($route, $texte, $couleur, $bulle='', $parametre = null)
    {
      $this->route = $route;
      $this->parametre = $parametre;
      $this->texte = $texte;
      $this->couleur = $couleur;
      $this->couleur = $this->couleur;
      $this->bulle = $bulle;
    }

    public function route()
    {
      return $this->route;
    }
    public function parametre()
    {
        return $this->parametre;
    }
    public function texte()
    {
      return $this->texte;
    }
    public function couleur()
    {
      return $this->couleur;
    }
    public function bulle()
    {
        return $this->bulle;
    }
}
