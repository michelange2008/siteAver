<?php

namespace App\Http\Controllers\Antikor\Aromaliste;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Liste;

class OldAromController extends Controller
{

    public function accueil()
    {

      return view('accueil', [
        'formations' => Formation::orderBy('nom','desc')->get(),
        'liste' => Liste::all(),
        'nombre' => 1,
      ]);
    }

    public function nombre(Request $request)
    {
      $nombre = intVal($request->all()['nombre']);

      return view('accueil', [
        'formations' => Formation::orderBy('nom','desc')->get(),
        'liste' => Liste::all(),
        'nombre' => $nombre,
      ]);
    }
}
