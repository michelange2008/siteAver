<?php

namespace App\Http\Controllers\Aver\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRep;
use App\Repositories\User\UserSousMenuRep;
use App\Repositories\Troupeaux\TroupeauAffichageRep;

use Illuminate\Support\Facades\DB;
use App\Models\Troupeau;
use App\Models\Espece;
use App\Models\Vsoafaire;
use App\Models\Bsa;
use App\Models\Ps;
use App\Models\User;
use App\Traits\PeriodeProphylo;
use App\Traits\EdeFormat;
use Illuminate\Support\Facades\Auth;
use App\Factories\Sceaux\SceauxListe;
use App\Constantes\ConstSceaux;

class UserAverController extends Controller
{
    use PeriodeProphylo;
    use EdeFormat;

    protected $userRep;
    protected $userSousMenuRep;
    protected $troupeauAffichageRep;

    public function __construct(UserRep $userRep, UserSousMenuRep $userSousMenuRep, TroupeauAffichageRep $troupeauAffichageRep)
    {
        $this->userRep = $userRep;
        $this->userSousMenuRep = $userSousMenuRep;
        $this->troupeauAffichageRep = $troupeauAffichageRep;
    }

    public function index()
    {
        $sousmenu = $this->userSousMenuRep->userSousmenu();
        $troupeauxUser = Troupeau::where('user_id', Auth()->user()->id)->get();

        $groupeSceaux = collect();
        foreach ($troupeauxUser as $troupeauUser)
        {
            $listeSceaux = new SceauxListe($troupeauUser->id);
            $listeSceaux->cacheSceau(ConstSceaux::ACTIVITE_IDENTITE);
            $listeSceaux->construitListeComplete();
            $groupeSceaux->put($troupeauUser->id, $listeSceaux);
        }

        return view('aver.user.user', [
            'troupeauxUser' => $troupeauxUser,
            'campagne' => $this->campagne(),
            'annee' => $this->dateActuelle(),
            // 'listeCards' => $listeCards,
            // 'listeBlasons' => $listeBlasons,
            'groupeSceaux' => $groupeSceaux,
            'sousmenu' => $sousmenu,
        ]);
    }

    public function getUser($saisie)
    {
      $users = User::where(function($query)use($saisie) {
        $query->where('name', 'like', "%".$saisie."%");
      });
      // return response()->json_encode($users->get());
      return json_encode($users->get());
    }
    public function getTroupeau($saisie)
    {
      // requete pour rechercher les éleveurs dont le nom correspond à la saisie en rajoutant bsa et vso
      $troupeaux = DB::table('troupeaux')
        ->select('troupeaux.id', 'users.name', 'users.ede', 'especes.nom', 'especes.abbreviation', 'vsoafaire.annee as annee_vso', 'bsa.date_bsa')
          ->join('users', function($join)use($saisie) {
              $join->on('users.id', "=", 'troupeaux.user_id')
              ->where('users.name', 'like', '%'.$saisie.'%');
          })
          ->join('especes', function($join2) {
            $join2->on('troupeaux.especes_id', "=", 'especes.id');
          })
          ->join('vsoafaire', function($join3) {
            $join3->on('vsoafaire.troupeau_id', '=', 'troupeaux.id');
          })
          ->join('bsa', function($join3) {
            $join3->on('bsa.troupeau_id', '=', 'troupeaux.id');
          })
          ->orderBy('bsa.date_bsa', 'desc')
          ->get();
      //S'il n'y a pas de bsa, le fichier $troupeau sera vide
      if($troupeaux->isEmpty())
      {
        // ALors on recherche la même chose mais sans les bsa
        $troupeaux = DB::table('troupeaux')
          ->select('troupeaux.id', 'users.name', 'users.ede', 'especes.nom', 'especes.abbreviation', 'vsoafaire.annee as annee_vso')
            ->join('users', function($join)use($saisie) {
                $join->on('users.id', "=", 'troupeaux.user_id')
                ->where('users.name', 'like', '%'.$saisie.'%');
            })
            ->join('especes', function($join2) {
              $join2->on('troupeaux.especes_id', "=", 'especes.id');
            })
            ->join('vsoafaire', function($join3) {
              $join3->on('vsoafaire.troupeau_id', '=', 'troupeaux.id');
            })
            ->get();
      }

      foreach ($troupeaux as $troupeau) {
        $troupeau->ede = $this->formatEde($troupeau->ede);
      }
      $grouped =  $troupeaux->groupBy('name');

      return json_encode($grouped);
    }
}
