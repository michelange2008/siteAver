<?php

namespace App\Http\Controllers\Aver\Admin;

use App\Http\Controllers\Controller;
use App\Models\Essai;
use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Factories\Sceaux\SceauActivite;
use App\Constantes\ConstSceaux;

class EssaiController extends Controller
{
    use \App\Traits\SortTroupeaux;
    use \App\Traits\ListePsParTroupeau;

    public function index()
    {
        $activite = new \App\Factories\Sceaux\SceauxListe(131);
        $activite->construitListeComplete();
        // $activite->construitListeSpeciale(ConstSceaux::TYPE_INFO);
        // $activite->retireSceau(ConstSceaux::ACTIVITE_IDENTITE);
        $activite->cacheSceau(ConstSceaux::PROPHYLO_IDENTITE);

      return view('essai', [
        'activite' => $activite,
      ]);
    }

}
