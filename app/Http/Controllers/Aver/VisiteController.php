<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\FevecRepository;
use App\Repositories\UsersRepository;
use App\Repositories\TroupeauxRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Repositories\Visite\VisiteRepository;

class VisiteController extends Controller
{
    
    protected $usersRepository;
    protected $visiteRepository;
    
    public function __construct(UsersRepository $usersRepository, VisiteRepository $visiteRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->visiteRepository = $visiteRepository;
    }
    
    
    public function changerVetsan()
    {
        $menu = FevecSousmenuRepository::vetsan();
        $listeItem = $this->visiteRepository->itemVetsan();
        $users = $this->usersRepository->getEleveur();
        
        return view('visite\vetsan', [
            'menu' => $menu,
            'listeItem' => $listeItem,
            'users' => $users, 
        ]);
    }
    
    public function modifVetsan(Request $request)
    {
        dd($request);
    }
    
    public function changerProphylo()
    {
        return 'prophylo';
    }

}
