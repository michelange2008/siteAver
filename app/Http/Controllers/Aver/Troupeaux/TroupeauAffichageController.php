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
//         dump(Auth::user());
        if(Auth::check()) $admin = (Auth::user()->admin) ? 1 :0;
        $troupeau = Troupeau::find($id);
        $listeBlasons = $this->troupeauAffichageRep->listeBlasons($id);
        $autreTroupeaux = $this->troupeauAffichageRep->hasPlusTroupeau($id);
        return view('aver/troupeaux/troupeauAffiche')->with([
            'admin' => $admin,
            'listeBlasons' => $listeBlasons,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'campagne' => $this->campagne(),
            'change' => false,
        ]);
    }
    
    public function paramAdmin($id)
    {
        $admin = (Auth::user()->admin) ? 1 :0;
        $troupeau = Troupeau::find($id);
        $listeBlasons = $this->troupeauAffichageRep->listeBlasons($id);
        $autreTroupeaux = null;
        $troupeauCampagne = $this->troupeauCampagne($id);
        dump($troupeauCampagne);
        return view('aver/troupeaux/paramAdmin')->with([
            'admin' => $admin,
            'listeBlasons' => $listeBlasons,
            'troupeau' => $troupeau,
            'autreTroupeaux' => $autreTroupeaux,
            'troupeauCampagne' => $this->troupeauCampagne($id),
            'campagne' => $this->campagne(),
            'change' => true,
        ]);
        
    }
    public function paramAdminModif(Request $request){
        $this->troupeauAffichageRep->modifParam(array_slice($request->all(), 1));
        
        return redirect()->back();
    }
}
