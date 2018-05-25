<?php

namespace App\Outils;

class LitCsv
{
  public static function litCsv($csv)
  {
    $csvAvecChemin = config('csv.path').$csv.".csv";

    $ligne = 1;

    if(($fichier = fopen($csvAvecChemin, 'r')) !== FALSE)
    {
      $table;
      while(($data = fgetcsv($fichier,";")) !== FALSE)
      {
        $table[] = $data;
      }
      return $table;
    }




  }
}
