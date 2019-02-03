<?php

namespace App\Http\Controllers\Parasitisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outils\LitCsv;

class ParasitismeController extends Controller
{

    public function index()
    {
      return view('parasitisme/parasitisme');
    }

    public function fiches()
    {
      $fiches = LitCsv::litJson('fiches');

      return view('parasitisme/fiches', [
        'fiches' => $fiches,
      ]);
    }

    public function formations()
    {
      return view('parasitisme/formations');
    }
}
