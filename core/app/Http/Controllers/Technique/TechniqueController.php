<?php

namespace App\Http\Controllers\Technique;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outils\LitCsv;

class TechniqueController extends Controller
{
    public function index()
    {
      $items = LitCsv::litJson('technique');

      return view('technique.index', [
        "items" => $items,
        "route" => 'accueil'
      ]);
    }

    public function animation()
    {
      return view('technique.reproduction.animation');
    }

    public function fiches($categorie)
    {
      $themes = []; // liste des thèmes technique
      $fiches = LitCsv::litJson('fiches'); // récupération de l'ensemble des fiches
      $items = LitCsv::litJson('technique');// recupération des différents themes techniques
      foreach ($items as $key => $value) { // creation d'une sous-liste en fonction de la catégorie (= theme)
        if($key === $categorie) {
          $theme = $items->$key; //récupération des infos de la catégorie sélectionnée
          $menu = $theme->menu; //récupération du menu de la catégorie sélectionnée
        }
      }

      foreach ($fiches as $value) { // creation d'une liste des thèmes (pour l'affiches de toutes les fiches)
        $themes[] = $value->categorie;
      }

      return view('technique.fiches', [
        'fiches' => $fiches,
        'themes' => array_unique($themes),
        'theme' => $theme,
        'menu' => $menu,
        'route' => 'technique.index',
      ]);
    }
}
