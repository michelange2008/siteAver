<?php

namespace App\Factories;

use App\Factories\GraphiquesFactory;
use App\Traits\RemplaceCaract;

class Pie
{

use RemplaceCaract;

  protected $titre;
  protected $id;
  protected $graph;

  public function __construct($titre, $data)
  {
    $this->titre = $titre;
    $this->id = $this->setId($titre);
    $this->graph = $this->graphFactory($data);
  }

  public function setId($titre)
  {
    return $this->suppr_accents(str_replace(' ', '_', str_replace('\'', '', $titre)));
  }

  public function graphFactory($data)
  {
    $graph = GraphiquesFactory::pie($this->titre, $data, $this->id);
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
