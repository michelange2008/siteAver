<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Troupeau;
use App\Models\Especes;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class EspecesRepository{

  public function getEspeces()
  {
    $listeEspeces = Especes::all();
    return $listeEspeces;
  }

  public function getNomEspeces()
  {
    $listeEspeces = Especes::all();
    foreach ($listeEspeces as $espece) {
      $especeSimple[$espece['attributes']['id']] = $espece['attributes']['nom'];
    }
    return $especeSimple;
  }
}
