<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\UsersRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Repositories\Visite\VetsanRepository;

class VisiteController extends Controller
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
        $menu = FevecSousmenuRepository::vetsan();
        $listeItem = $this->vetsanRepository->itemVetsan(); // AFFICHAGE DES CARDS
        $users = $this->usersRepository->getEleveur(); // LISTE DES ELEVEURS
        
        return view('visite\vetsan', [
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
    
    
    public function majVetSan() // ATTRIBUE VRAI POUR VET SAN AUX ELEVEURS EN CONVENTION
    {
        $this->majVetsan();
        
        return redirect()->back();
    }

}
