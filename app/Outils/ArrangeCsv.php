<?php
/* CLASSE qui récupère les infos du csv et
// construit un tableau de tableaux: ces derniers ont les élements
// du titre comme étiquettes
*/

namespace App\Outils;

use App\Outils\LitCsv;

class ArrangeCsv
{

  public static function organise($nom)
  {
    $tableOrigine = LitCsv::litCsv($nom);

    $titres = array_shift($tableOrigine); // crée la ligne de titre avec la première ligne du tableau

    $titres = explode(";", $titres[0]); // fait un tableau avec chaque en-tête

    $tableFinale = [];
    for($i = 0 ; $i < count($tableOrigine) ; $i++)
    {
      $ligne = explode(";", $tableOrigine[$i][0]);
      $sousTable = [];
      for($j = 0 ; $j < count($titres); $j++ )
        {
          $sousTable[$titres[$j]] = utf8_encode($ligne[$j]);
        }
        $tableFinale[] = ($sousTable);
    }
    return $tableFinale;
  }
}
