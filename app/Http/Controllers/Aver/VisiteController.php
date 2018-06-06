<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\FevecRepository;
use App\Repositories\UsersRepository;
use App\Repositories\TroupeauxRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Repositories\Visite\VetsanRepository;
use App\Repositories\Visite\ProphyloRepository;

use App\Models\User;
use App\Models\Troupeau;
use App\Models\Anneeprophylo;

use Carbon\Carbon;

class VisiteController extends Controller
{
    use \App\Traits\MajVetSan;
    use \App\Traits\PeriodeProphylo;
    
    protected $usersRepository;
    protected $vetsanRepository;
    protected $prophyloRepository;


    public function __construct(UsersRepository $usersRepository, VetsanRepository $vetsanRepository, ProphyloRepository $prophyloRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->vetsanRepository = $vetsanRepository;
        $this->prophyloRepository = $prophyloRepository;
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

    public function changerProphylo() // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophylo();
        $listeItem = $this->prophyloRepository->itemProphylo();
        $troupeaux = Troupeau::all();
        return view('visite\prophylo\changerProphylo', [
            'menu' => $menu,
            'listeItem' => $listeItem,
            'troupeaux' => $troupeaux
        ]);
    }
    
    public function changerProphyloBv() // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophyloBv();
        $troupeaux = Troupeau::all();
        $annees = $this->cinqDernieresAnnees();
        return view('visite\prophylo\changerProphyloBv', [
            'menu' => $menu,
            'troupeaux' => $troupeaux,
            'annees' => $annees,
        ]);
    }
    
    public function modifProphyloBv(Request $request)
    {
        $datas = $request->all();
        array_shift($datas);
        foreach ($datas as $data)
        {
        $anneeprophylos_id = explode("_", $data)[0];
        $troupeaux_id = explode("_", $data)[1];
        $this->prophyloRepository->ajouteProphylo($anneeprophylos_id, $troupeaux_id);
            
        }
    }


    public function changerProphyloPr() // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophylo();
        $listeItem = $this->prophyloRepository->itemProphylo();
        $troupeaux = Troupeau::where('espece', '<', 5)->get();
//        return view('visite\changerProphyloPr', [
//            'menu' => $menu,
//            'listeItem' => $listeItem,
//            'troupeaux' => $troupeaux
//        ]);
    }
    
    public function changerProphyloAutres() // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophylo();
        $listeItem = $this->prophyloRepository->itemProphylo();
        $troupeaux = Troupeau::all();
        return view('visite\changerProphyloAutres', [
            'menu' => $menu,
            'listeItem' => $listeItem,
            'troupeaux' => $troupeaux
        ]);
    }
    
    public function majProphylo()
    {
    }

}
