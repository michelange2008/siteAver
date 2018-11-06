<?php

namespace App\Outils;

class LitCsv
{
  public static function litCsv($csv)
  {

    $csvAvecChemin = config('fichiers.csv').$csv.".csv";

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
