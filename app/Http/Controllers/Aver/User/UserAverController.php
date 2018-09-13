<?php

namespace App\Http\Controllers\Aver\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRep;
use App\Repositories\User\UserSousMenuRep;
use App\Repositories\Troupeaux\TroupeauAffichageRep;

use App\Models\Troupeau;
use App\Models\Ps;
use App\Traits\PeriodeProphylo;
use Illuminate\Support\Facades\Auth;

class UserAverController extends Controller
{
    use PeriodeProphylo;
    
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
        $listeCards = collect();
        foreach ($troupeauxUser as $troupeauUser)
        {
            $listeCards->put($troupeauUser->id, $this->troupeauAffichageRep->listeCardsELeveur($troupeauUser->id));
        }
        $listeBlasons = collect();
        foreach ($troupeauxUser as $troupeauUser)
        {
            $listeBlasons->put($troupeauUser->id, $this->troupeauAffichageRep->listeBlasonsEleveur($troupeauUser->id));
        }
        
//         dd($listeCards->get('721')->cardListe()); 
        return view('aver.user.user', [
            'troupeauxUser' => $troupeauxUser,
            'campagne' => $this->campagne(),
            'annee' => $this->dateActuelle(),
            'listeCards' => $listeCards,
            'listeBlasons' => $listeBlasons,
            'sousmenu' => $sousmenu,
        ]);
    }
}
