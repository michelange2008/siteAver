<?php

namespace App\Http\Controllers\Aver\Visites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\BsaRepository;

use App\Models\Troupeau;
use App\Models\Ps;
use App\Traits\PeriodeProphylo;

class BsaController extends Controller
{
    use \App\Traits\CardGroupeEspeces;
    use PeriodeProphylo;
    
    protected $bsaRepository;
    
    public function __construct(BsaRepository $bsaRepository)
    {
        $this->bsaRepository = $bsaRepository;
    }

    public function index(){
        $troupeaux = $this->bsaRepository->listeBsa();
        $menu = VisitesSousMenuRepository::bsaAccueil();
        $cardGroupesEspece = $this->listCardGroupeEspece();
        return view('visites/bsa', [
            "menu" => $menu,
            'troupeaux' => $troupeaux,
            'cardGroupesEspece' => $cardGroupesEspece,
        ]);
    }
    
    public function modif(Request $request)
    {
        $modif = $this->bsaRepository->majBsa($request);
        
        return redirect()->back()->with('message', 'Il y a eu '.$modif['ajouts']. ' ajout(s) et '.$modif['suppressions'].' suppression(s).');
    }
    
    public function saisie()
    {
        $troupeaux = Troupeau::all();
        return view('visites.bsaSaisie', [
            'troupeaux' => $troupeaux,
            'campagne' => $this->campagne(),
        ]);
    }
    
    public function store(Request $request)
    {
        $msg = "This is a simple message.";
//         return "coucou";
        return response()->json(array('msg'=> $msg), 200);
    }
    
    public function ps($troupeau_id)
    {
        $troupeau = Troupeau::find($troupeau_id);
        $pss = Ps::all();
        return view('visites.bsaPs', [
            'troupeau' => $troupeau,
            'pss' => $pss,
        ]);
    }
    
    public function remarque($troupeau_id)
    {
        return $troupeau_id;
    }
}
