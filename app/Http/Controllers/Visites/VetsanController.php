<?php

namespace App\Http\Controllers\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\UsersRepository;
use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\VetsanRepository;

class VetsanController extends Controller
{
    use \App\Traits\MajVetSan;
    
    protected $usersRepository;
    protected $vetsanRepository;


    public function __construct(UsersRepository $usersRepository, VetsanRepository $vetsanRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->vetsanRepository = $vetsanRepository;
    }
    
    
    public function changerVetsan()
    {
        $menu = VisitesSousMenuRepository::vetsan();
        $listeItem = $this->vetsanRepository->itemVetsan(); // AFFICHAGE DES CARDS
        $users = $this->usersRepository->getEleveur(); // LISTE DES ELEVEURS
        
        return view('visites\vetsan', [
            'menu' => $menu,
            'listeItem' => $listeItem,
            'users' => $users, 
        ]);
    }
    
    public function modifVetsan(Request $request)
    {
        $liste = $request->all();
        array_shift($liste); // ENLEVE LA PREMIERE LIGNE (token)
        $this->vetsanRepository->testSiAbsent($liste); // ATTRIBUE FAUX A LA COLONNE VETSAN AUX ELEVEURS ABSENTS DU REQUEST
        $this->vetsanRepository->testSiPresent($liste); // ATTRIBUE VRAI A LA COLONNE VETSAN AUX ELEVEURS PRESENTS DANS LE REQUEST
        return redirect()->back();
    }
    
    
    public function conventionVetSan() // ATTRIBUE VRAI POUR VET SAN AUX ELEVEURS EN CONVENTION
    {
        $nbAjout = $this->majVetsan();
        
        if($nbAjout == 0)
        {
            return redirect()->back()->with('rien', "Il n'y a eu aucun ajout" );
        }else{
            return redirect()->back()->with('message', "il y a eu ".$nbAjout." ajout(s)" );
        }
    }

}
