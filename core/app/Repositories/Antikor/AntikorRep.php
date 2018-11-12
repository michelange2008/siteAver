<?php
namespace App\Repositories;

use App\Repositories\Antikor\Liens;

class AntikorRep {


  public function litInfos()
  {
    $fichier_liste = @fopen(config('fichiers.txt')."antikor_infos.txt", 'r');
    if(!$fichier_liste) trigger_error("Le fichier n'existe pas",E_USER_ERROR);
    else {
      while (!feof($fichier_liste)){
        $ligne = fgets($fichier_liste);
        $mots = explode(";", $ligne);
        if($mots[0]){
          $listeInfos[$mots[0]] = $mots[1];
        }
      }
    }
    fclose($fichier_liste);
    return $listeInfos;
  }

  public function litLiens()
  {
    $listeLiens = [];
    $fichier_liens = @fopen(config('fichiers.txt')."antikor_liens.txt", 'r');
    if(!$fichier_liens) trigger_error("Le fichier n'existe pas",E_USER_ERROR);
    else {
      while (!feof($fichier_liens)){
        $ligne = fgets($fichier_liens);
        $mots = explode(";", $ligne);
        if($mots[0]){
          $lien = new Liens($mots[0], $mots[1], $mots[2]);
          $listeLiens[] = $lien;
        }
      }
    }
    fclose($fichier_liens);
    return $listeLiens;
  }

}
