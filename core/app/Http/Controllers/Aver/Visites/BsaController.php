<?php

namespace App\Http\Controllers\Aver\Visites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\BsaRepository;

use App\Models\Troupeau;
use App\Models\Ps;
use App\Traits\PeriodeProphylo;
use App\Models\Bsa;
use App\Models\Note;
use App\Traits\SortTroupeaux;
use App\Models\Veto;

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
            'annee' => $this->dateActuelle(),
        ]);
    }

    public function store(Request $request)
    {
        $datas = $request->all();

        $veto = Veto::where('user_id', Auth::user()->id)->first();

        $bsa_exist = Bsa::where('troupeau_id', $datas['troupeau_id'])
            ->where('date_bsa', $datas['date_bsa'])->get();
        if($bsa_exist->count() == 0)
        {
            $bsa = new Bsa();
            $bsa->troupeau_id = $datas['troupeau_id'];
            $bsa->date_bsa = $datas['date_bsa'];
            $bsa->veto_id = $veto->id;
            $bsa->save();

            $nouveauBsa = Bsa::where('troupeau_id', $datas['troupeau_id'])
                ->where('date_bsa', $datas['date_bsa'])->first();
            $nouveauBsa_id = $nouveauBsa->id;
            $title = "Génial !";
            $msg = 'Le bilan a été enregistré à la date '.$datas['date_bsa'];
        }
        else
        {
            $title = "Attention !";
            $msg = 'Il y a déjà un bilan à cette date pour cet éleveur';
            $nouveauBsa_id = 0;
        }
        return response()->json(['title' => $title, 'msg'=> $msg, 'bsa_id' => $nouveauBsa_id], 200);
    }

    public function ps($troupeau_id, $bsa_id)
    {
        $troupeau = Troupeau::find($troupeau_id);
        $pss = Ps::all();
        $bsa = Bsa::find($bsa_id);
        return view('visites.bsaPs', [
            'troupeau' => $troupeau,
            'pss' => $pss,
            'bsa_encours' => $bsa,
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
        $title = "Ajout d'un protocole de soin";
        $msg = "";
        return response()->json(['title' => $title, 'msg' => $msg, 'bsa_date'=> $bsa->date_bsa], 200);
    }

    public function enlevePsaBsaUnTroupeau(Request $request)
    {
      $datas = $request->all();
      $bsa = Bsa::find($datas['bsa_id']);
      $bsa->pss()->detach($datas['ps_id']);
      $title = "Suppression d'un protocole de soin";
      $msg = "";
      return response()->json(['title' => $title, 'msg'=> $msg], 200);
    }

    public function enleveBsaUnTroupeau(Request $request)
    {
      $datas = $request->all();
      Bsa::destroy($datas['bsa_id']);
      $title = "Le bilan sanitaire a été supprimé";
      $msg = $datas['bsa_id'];
      return response()->json(['title' => $title, 'msg'=> $msg], 200);
    }

    public function ajoutNote(Request $request)
    {
      $datas = $request->all();
      $note = new Note();
      $note->troupeau_id = $datas['troupeau_id'];
      $note->texte = $datas['note'];
      $note->save();

      return response()->json([
        'title' => 'La nouvelle note  a été ajoutée',
        'msg' => "",
        'note_id' => $note->id,
        'date' => $note->updated_at,
        'texte' => $datas['note']
      ]);
    }
}
