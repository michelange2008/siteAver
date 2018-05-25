<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Troupeau;
use App\Models\Races;
use App\Models\Especes;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

/**
 *
 */
class RacesRepository
{

  function getRaces()
  {
    return Races::all();
  }

  public function getNomRaces()
  {
    $races = Races::all();
    foreach($races as $race)
    {
      $racesSimple[$race['attributes']['id']] = $race['attributes']['nom'];
    }
    return $racesSimple;
  }
/** Fonction qui produit un tableau avec pour chaque espece une liste de races
*/
  public function getGroupeRaces()
  {
    $listeEspeces = Especes::all();
    foreach($listeEspeces as $espece)
    {
      $races = Especes::find($espece['id'])->races;
      foreach ($races as $race) {
        $listeRaces[] = $race['nom'];
      }
      $groupeRaces[$espece['nom']] = $listeRaces ;
    }
    return $groupeRaces;
  }
  public function getListeRacesUneEspece($id)
  {
    $races = Especes::find($id)->races;
    foreach ($races as $race) {
      $listeRaces[] = $race['nom'];
    }
  return $listeRaces;
  }
}
