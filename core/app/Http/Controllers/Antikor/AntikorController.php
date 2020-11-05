<?php

namespace App\Http\Controllers\Antikor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controller\AverController;
use App\Repositories\Antikor\AntikorRep;

class AntikorController extends Controller
{
  protected $antikorRep;

  public function __construct(AntikorRep $antikorRep)
  {
    $this->antikorRep = $antikorRep;
  }


  public function index()
  {
    $listeInfos = $this->antikorRep->litInfos();
    $listeLiens = $this->antikorRep->litLiens();
      return view('antikor.accueil', [
        'listeInfos' => $listeInfos,
        'listeLiens' => $listeLiens,
      ]);
  }

  public function choix(Request $request)
  {
    dd($request->all());
  }

}
