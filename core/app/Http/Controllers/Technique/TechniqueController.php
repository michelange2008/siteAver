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
      $fiches = LitCsv::litJson('fiches');
      $items = LitCsv::litJson('technique');
      foreach ($items as $key => $value) {
        if($key === $categorie) {
          $theme = $items->$key;
        }
      }

      return view('technique.fiches0', [
        'fiches' => $fiches,
        'theme' => $theme,
        'route' => 'technique.index',
      ]);
    }
}
