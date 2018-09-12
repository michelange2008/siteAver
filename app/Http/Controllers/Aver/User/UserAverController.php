<?php

namespace App\Http\Controllers\Aver\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRep;
use App\Repositories\User\UserSousMenuRep;

use App\Models\Troupeau;
use App\Traits\PeriodeProphylo;

class UserAverController extends Controller
{
    use PeriodeProphylo;
    
    protected $userRep;
    protected $userSousMenuRep;
    
    public function __construct(UserRep $userRep, UserSousMenuRep $userSousMenuRep)
    {
        $this->userRep = $userRep;
        $this->userSousMenuRep = $userSousMenuRep;
    }
    
    public function index()
    {
        $sousmenu = $this->userSousMenuRep->userSousmenu();
        $troupeauxUser = Troupeau::where('user_id', Auth()->user()->id)->get();
        
        return view('aver.user.user', [
            'troupeauxUser' => $troupeauxUser,
            'campagne' => $this->campagne(),
            'annee' => $this->dateActuelle(),
            'sousmenu' => $sousmenu,
        ]);
    }
}
