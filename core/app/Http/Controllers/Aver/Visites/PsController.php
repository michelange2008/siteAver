<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especes;
use App\Models\Troupeau;
use App\Traits\EspecesPresentes;
use App\Repositories\Visites\PsRep;

use Illuminate\Support\Facades\Auth;
use App\Factories\PdfFactory\PsConstruitPdf;
use App\Models\Ps;
use App\Models\Veto;
use App\Models\User;
use App\Models\Bsa;
use App\Models\Bsa_ps;
use Carbon\Carbon;
// use Validator;

class PsController extends Controller
{
    use EspecesPresentes;

    protected $psRep;

    public function __construct(PsRep $psRep)
    {
        $this->psRep = $psRep;
    }

    public function index()
    {
        $listePs = Ps::all();

        return view('visites.ps', [
            'menu' => "",
            'listePs' => $listePs,
            'listeEspeces' => $this->listeEspecesPresentes(),
        ]);
    }

    public  function modif(Request $request)
    {
        $this->psRep->enregistre($request);

        return redirect()->back()->with('message', 'les modifications ont été enregistrées');
    }

    public function create()
    {
        return view('visites.psAjout', [
            'listeEspeces' => $this->listeEspecesPresentes(),
        ]);
    }

    public function store(Request $request)
    {
        $this->psRep->store($request);

        return redirect()->route('ps.index');
    }

    public function destroy($id)
    {
        $this->psRep->destroy($id);

        return redirect()->back()->with('message', 'ce protocole de soin a bien été supprimé');
    }

    public function affichePs($ps_id)
    {
        $ps = Ps::find($ps_id);

        return view('visites.psListeEleveurs', [
            'ps' => $ps,
        ]);
    }

    /*
    // crée un pdf avec le ps d'un éleveur donné pour un bsa donné
    */
    public function affichePsUnEleveur($user_id, $bsa_id, $ps_id)
    {
        $ps = Ps::find($ps_id);
        $bsa = Bsa::find($bsa_id);
        $date = $bsa->date_bsa;
        $dateTab = explode("-", $date);
        $dateEntiere = Carbon::createFromDate($dateTab[0], $dateTab[1], $dateTab[2]);
        $veto = Veto::where('id', $bsa->veto_id)->first();
        $user = User::find($user_id);
        $construitPdf = new PsConstruitPdf();
        $construitPdf->Header();
        $construitPdf->creePdf($ps, $user, $dateEntiere, $veto);
    }

    public function elimineDoublon($troupeau_id)
    {
      $liste_pss = collect();
      $bsas = Bsa::where('troupeau_id', $troupeau_id)->get();
      foreach ($bsas as $bsa) {
        foreach ($bsa->pss as $ps) {
          $liste_pss->push(["ps_id" => $ps->id, "bsa_id" => $bsa->id, "date_bsa" => $bsa->date_bsa]);
        }
      }
      // dd($liste_pss->max("date"));
      $liste = collect();
      $grouped = $liste_pss->groupBy('ps_id');
      foreach ($grouped as $key => $value) {
        if($value->count() > 1) {
          $valeur_unique = $value->sortBy("date_bsa")->first();
          // dump($value);
          Bsa_ps::where('ps_id', $valeur_unique['ps_id'])->delete();
          $bsa_ps = new Bsa_ps();
          $bsa_ps->bsa_id = $valeur_unique['bsa_id'];
          $bsa_ps->ps_id = $valeur_unique['ps_id'];
          $bsa_ps->save();

        }

      }

    }
}
