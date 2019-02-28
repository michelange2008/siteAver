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

      return view('technique.fiches', [
        'fiches' => $fiches,
        'categorie' => $categorie,
        'route' => 'technique.index',
      ]);
    }
}
