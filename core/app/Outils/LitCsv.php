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

  public static function litJson($json)
  {
    $jsonAvecChemin = config('fichiers.json').$json.".json";

    $donneesJson = file_get_contents($jsonAvecChemin);

    return json_decode($donneesJson);
  }
}
