<?php
namespace App\Factories;

use App\Factories\Pie;
use App\Factories\Donut;

class Graphiques
{
  const DONUT = 'donut';
  const PIE = 'pie';

  public static function creeGraph($typeGraph, $titre, $data)
  {
    switch ($typeGraph) {
      case SELF::DONUT:
      $graph = new Donut($titre, $data);
        break;

      case SELF::PIE:
      $graph = new Pie($titre, $data);
      break;
      default:
        // code...
        break;
    }
    echo $graph->graph();
    return $graph;
  }
}
