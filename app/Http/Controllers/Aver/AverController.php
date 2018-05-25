<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Requests\TroupeauRequest;
use App\Http\Controllers\Controller;
use App\Models\Troupeau;
use App\Outils\ArrangeCsv;
use Illuminate\Support\Facades\Auth;

class AverController extends Controller
{
  protected $especes = [
          1 =>  "vaches allaitantes",
          2 =>  "vaches laitières",
          3 =>  "brebis allaitantes",
          4 =>  "brebis laitières",
          5 =>  "chèvres"
        ];
  protected $productions = [
    1 =>  "lait",
    2 =>  "viande",
    3 =>  "mixte",
    4 =>  "laine",
    5 =>  "oeufs",
    6 =>  "divers",
  ];
  protected $races = [
    2 =>  'charolaise',
    39 =>  'lacaune',
  ];
    public function index()
    {
      return('register');
    }

    public function creerTroupeau()
    {

      $liste = [
        'especes' => $this->especes,
        'productions' => $this->productions,
        'races' => $this->races,
      ];
      return view('aver\creerTroupeau')->with('liste', $liste);
    }
    public function enregistrerTroupeau(TroupeauRequest $request)
    {
      $troupeau = new Troupeau();
      $troupeau->saisieTroupeau($request);

      return view('aver\confirmeTroupeau')->with('espece', $troupeau->espece);
    }
}
