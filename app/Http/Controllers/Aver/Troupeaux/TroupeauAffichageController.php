<?php

namespace App\Http\Controllers\Aver\Troupeaux;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Repositories\Troupeaux\TroupeauAffichageRep;
use App\Traits\PeriodeProphylo;
use Illuminate\Support\Facades\Auth;

class TroupeauAffichageController extends Controller
{
    use PeriodeProphylo;
    
    protected $troupeauAffichageRep;
    
    public function __construct(TroupeauAffichageRep $troupeauAfficheRep)
    {
        $this->troupeauAffichageRep = $troupeauAfficheRep;
    }
    
    public function index($id)
    {
        $admin = (Auth::user()->admin) ? 1 :0;
        $troupeau = Troupeau::find($id);
        $campagne = $this->campagne();
        $listeBlasons = $this->troupeauAffichageRep->listeBlasons($id);
        $autreTroupeaux = $this->troupeauAffichageRep->hasPlusTroupeau($id);
        return view('aver/troupeaux/troupeauAffiche')->with([
            'admin' => $admin,
            'listeBlasons' => $listeBlasons,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'campagne' => $campagne,
        ]);
    }
    
    public function paramAdmin($id)
    {
        $admin = (Auth::user()->admin) ? 1 :0;
        $troupeau = Troupeau::find($id);
        $campagne = $this->campagne();
        $listeBlasons = $this->troupeauAffichageRep->listeBlasons($id);
        $autreTroupeaux = null;
        
        return view('aver/troupeaux/paramAdmin')->with([
            'admin' => $admin,
            'listeBlasons' => $listeBlasons,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'campagne' => $campagne,
        ]);
    }
}
