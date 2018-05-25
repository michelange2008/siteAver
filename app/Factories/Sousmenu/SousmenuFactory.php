<?php

namespace App\Factories\Sousmenu;

use App\Factories\Sousmenu\SousmenuItem;

class SousmenuFactory
{
  protected $titreSousmenu;
  protected $listeSousmenu;

  public function __construct($titreSousmenu)
  {
    $this->titreSousmenu = $titreSousmenu;
    $this->listeSousmenu = [];
  }

  public function addSousmenuItem(SousmenuObjet $sousmenuItem)
  {
    $this->listeSousmenu[] = $sousmenuItem;
  }

  public function titreSousmenu()
  {
    return $this->titreSousmenu;
  }

  public function listeSousmenu()
  {
    return $this->listeSousmenu;
  }
}
