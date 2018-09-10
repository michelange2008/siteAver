<?php

namespace App\Http\Controllers\Aver\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRep;
use App\Repositories\User\UserSousMenuRep;

class UserAverController extends Controller
{
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
        
        return view('aver.user.user', [
            'sousmenu' => $sousmenu,
        ]);
    }
}
