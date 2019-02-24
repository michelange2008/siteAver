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
      ]);
    }
}
