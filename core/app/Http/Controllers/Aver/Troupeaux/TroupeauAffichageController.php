<?php
/*
 * Affichage du troupeau d'un éleveur donné avec les informations importantes et la possiblité
 * de modifier certains paramètres: vetsan, prophylo, vso, bsaimportant
 */
namespace App\Http\Controllers\Aver\Troupeaux;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Repositories\Troupeaux\TroupeauAffichageRep;
use App\Traits\PeriodeProphylo;
use Illuminate\Support\Facades\Auth;
use App\Traits\EdeFormat;
use Carbon\Carbon;
use App\Constantes\ConstSceaux;
use App\Factories\Sceaux\SceauxListe;


class TroupeauAffichageController extends Controller
{
    use PeriodeProphylo;
    use EdeFormat;

    protected $troupeauAffichageRep;

    public function __construct(TroupeauAffichageRep $troupeauAfficheRep)
    {
        $this->troupeauAffichageRep = $troupeauAfficheRep;
    }

    public function index($id)
    {
        if(!Auth::check()){
            return redirect()->guest(route('login'));
        }
        $troupeau = Troupeau::find($id);
        $troupeau->user->ede = $this->formatEde($troupeau->user->ede);
        $listeSceaux = new SceauxListe($id);
        $listeSceaux->construitListeComplete();
        $autreTroupeaux = $this->troupeauAffichageRep->hasPlusTroupeau($id);
        return view('aver/troupeaux/troupeauAffiche')->with([
            'listeSceaux' => $listeSceaux,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'campagne' => $this->campagne(),
            'change' => false,
        ]);
    }
    /*
     * Modification des 4 paramètres cités plus haut
     */
    public function paramAdmin($id)
    {

        $troupeau = Troupeau::find($id);
        $troupeau->user->ede = $this->formatEde($troupeau->user->ede);
        $listeSceaux = new SceauxListe($id);
        $listeSceaux->construitListeComplete();
        $autreTroupeaux = null;
        $troupeauCampagne = $this->troupeauCampagne($id);
        return view('aver/troupeaux/paramAdmin')->with([
            'listeSceaux' => $listeSceaux,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'troupeauCampagne' => $this->troupeauCampagne($id),
            'annee' => Carbon::now()->year,
            'campagne' => $this->campagne(),
            'change' => true,
        ]);

    }
    /*
     * Récupération via POST des modifications saisies dans le formulaire
     */
    public function paramAdminModif(Request $request){

        $modif = $this->troupeauAffichageRep->modifParam(array_slice($request->all(), 1));

        return redirect()->route('troupeau.accueil', $request->all()['id_troupeau'])->with('message', $modif.' modifications effectuées');
    }
}
