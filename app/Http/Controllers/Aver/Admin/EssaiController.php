<?php

namespace App\Http\Controllers\Aver\Admin;

use App\Http\Controllers\Controller;
use App\Models\Essai;
use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Factories\Sceaux\SceauActivite;

class EssaiController extends Controller
{
    use \App\Traits\SortTroupeaux;
    use \App\Traits\ListePsParTroupeau;

    public function index()
    {
        $activite = new \App\Factories\Sceaux\SceauxListe(131);
        $pss = $this->listePsParTroupeau(131);
        $troupeau = Troupeau::find(131);

      return view('essai', [
        'activite' => $activite,
      ]);
    }

}
