<?php

namespace App\Factories;

use App\Models\Especes;
use App\Models\Troupeau;
use App\Models\User;

class StatFactory
{


  public static function convSuiv()
  {
    $nbEleveurs = [];
    $activite = \App\Models\Activite::all();
    foreach($activite as $act)
    {
        $nbEl = User::where('activite_id', $act->id)->count();
        if($nbEl > 0)
        {
            $nbEleveurs[$act->nom] = $nbEl;
        }
    }
    return $nbEleveurs;
/*    $nbConvention = User::where('activite_id', 1)->count();
    $nbSuivi = User::count() - $nbConvention;
    $datas = [
      'Convention' => $nbConvention,
      'Suivi' => $nbSuivi
    ];
    return $datas;
  */}

  public static function nbTpDiff()
  {
    $nbTroupeauxDiff = [];
    $especes = Especes::all();
    foreach ($especes as $espece) {
      if(Troupeau::where('especes_id', $espece->id)->count() != 0){
        $nbTroupeau = Troupeau::where('especes_id', $espece->id)->count();
        $nbTroupeauxDiff[$espece->nom] = $nbTroupeau;
      }
    }
    return $nbTroupeauxDiff;
  }

  public static function uivParEsp()
  {
    $uivParEsp = [];
    $especes = Especes::all();
    foreach ($especes as $espece) {
      if(Troupeau::where('especes_id', $espece->id)->count() != 0){
        $uivEsp = Troupeau::where('especes_id', $espece->id)->sum('uiv');
        $uivParEsp[$espece->nom] = intval($uivEsp);
      }
    }
    return $uivParEsp;
  }

}
