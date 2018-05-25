<?php

namespace App\Factories\Sousmenu;

class SousmenuItem extends SousmenuObjet
{

    protected $route;
    protected $bouton;
    protected $couleur;
    protected $bulle;

    public function __construct($route, $bouton, $couleur, $bulle='')
    {
      $this->route = $route;
      $this->bouton = $bouton;
      $this->couleur = $this->setCouleur($couleur);
      $this->bulle = $bulle;
    }

    private function setCouleur($couleur)
    {
      if($couleur == "vert") $class = 'btn-success';
      elseif($couleur ==  "orange") $class = 'btn-warning';
      elseif($couleur ==  "rouge") $class = 'btn-danger';
      elseif($couleur == 'gris') $class = 'btn-secondary';
      elseif($couleur == 'bleu') $class = 'btn-primary';
      elseif($couleur == 'clair') $class = 'btn-light';
      elseif($couleur == 'noir') $class = 'btn-dark';
      else $class = 'btn-success';
      return $class;
    }

    public function route()
    {
      return $this->route;
    }
    public function bouton()
    {
      return $this->bouton;
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
