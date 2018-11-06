<?php

namespace App\Factories;

use App\Factories\GraphiquesFactory;
use App\Traits\RemplaceCaract;

class Donut
{

use RemplaceCaract;

  protected $titre;
  protected $titre_interne;
  protected $id;
  protected $graph;

  public function __construct($titre, $data)
  {
    $this->titre = $titre;
    $this->titre_interne = 'titre_'.rand();
    $this->id = 'id_'.rand();
    $this->graph = $this->graphFactory($data);
  }

  public function graphFactory($data)
  {
    $graph = GraphiquesFactory::donut($this->titre_interne, $data, $this->id);

    return $graph;
  }

  public function titre()
  {
    return $this->titre;
  }
  public function id()
  {
    return $this->id;
  }
  public function graph()
  {
    return $this->graph;
  }
}
