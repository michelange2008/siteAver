<?php

namespace App\Http\Controllers\Antikor\Aromaliste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aromaliste\Aromformation;
use App\Models\Aromaliste\Arompreparation;

class AromalisteController extends Controller
{

    public function index()
    {
      return view('antikor.aromaliste.aromalisteAccueil', [
        'formations' => Aromformation::all(),
        'preparations' => Arompreparation::all(),
      ]);
    }

    public function choix(Request $request)
    {
      $nb_stagiaires = $request->all()['nb'];
      dd($nb_stagiaires);

    }
}
