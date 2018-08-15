<?php

namespace App\Http\Controllers\Aver\Visites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\BsaRepository;

use App\Models\Troupeau;
use App\Models\Ps;
use App\Traits\PeriodeProphylo;
use App\Models\Bsa;
use App\Traits\SortTroupeaux;

class BsaController extends Controller
{
    use \App\Traits\CardGroupeEspeces;
    use PeriodeProphylo;
    use SortTroupeaux;
    
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
            'troupeaux' => $this->sortTroupeaux(),
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

        return view('visites.bsaSaisie', [
            'troupeaux' => $this->sortTroupeaux(),
            'campagne' => $this->campagne(),
        ]);
    }
    
    public function store(Request $request)
    {
        $datas = $request->all();
        
        $bsa_exist = Bsa::where('troupeau_id', $datas['troupeau_id'])
            ->where('date_bsa', $datas['date_bsa'])->get();
        if($bsa_exist->count() == 0)
        {
        $bsa = new Bsa();
        $bsa->troupeau_id = $datas['troupeau_id'];
        $bsa->date_bsa = $datas['date_bsa'];
        $bsa->save();
        
        $nouveauBsa = Bsa::where('troupeau_id', $datas['troupeau_id'])
            ->where('date_bsa', $datas['date_bsa'])->first();
        
        $title = "Génial !";
        $msg = 'Le bilan a été enregistré à la date '.$datas['date_bsa'];
        }
        else
        {
            $title = "Attention !";
            $msg = 'Il y a déjà un bilan à cette date pour cet éleveur';
        }
        return response()->json(['title' => $title, 'msg'=> $msg, 'bsa_id' => $nouveauBsa->id], 200);
    }
    
    public function ps($troupeau_id, $bsa_id)
    {
        $troupeau = Troupeau::find($troupeau_id);
        $pss = Ps::all();
        $bsa = Bsa::find($bsa_id);
        return view('visites.bsaPs', [
            'troupeau' => $troupeau,
            'pss' => $pss,
            'bsa' => $bsa,
        ]);
    }
    
    public function remarque($troupeau_id)
    {
        return $troupeau_id;
    }
    
    public function attribuePsaBsaUnTroupeau(Request $request)
    {
        $datas = $request->all();
        $bsa = Bsa::find($datas['bsa_id']);
        $bsa->pss()->attach($datas['ps_id']);
        $title = $bsa->date_bsa;
        $msg = $datas['ps_id'];
        return response()->json(['title' => $title, 'msg'=> $msg], 200);
        
    }
}
