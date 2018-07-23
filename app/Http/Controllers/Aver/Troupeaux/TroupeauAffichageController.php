<?php

namespace App\Http\Controllers\Aver\Troupeaux;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Repositories\Troupeaux\TroupeauAffichageRep;
use App\Traits\PeriodeProphylo;

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
        $troupeau = Troupeau::find($id);
        $campagne = $this->campagne();
        $listeBlasons = $this->troupeauAffichageRep->listeBlasons($id);
        $autreTroupeaux = $this->troupeauAffichageRep->hasPlusTroupeau($id);
        return view('aver/troupeaux/troupeauAffiche')->with([
            'listeBlasons' => $listeBlasons,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'campagne' => $campagne,
        ]);
    }
}
