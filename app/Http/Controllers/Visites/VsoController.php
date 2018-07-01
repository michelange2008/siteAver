<?php

namespace App\Http\Controllers\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\VsoRepository;

use App\Models\Troupeau;
use App\Models\User;


class VsoController extends Controller
{
    use \App\Traits\PeriodeProphylo;
    use \App\Traits\UserVetsan;
    
    protected $vsoRepository;
    
    public function __construct(VsoRepository $vsoRepository)
    {
        $this->vsoRepository = $vsoRepository;
    }

    public function index(){
        $menu = VisitesSousMenuRepository::vsoAccueil();
        $troupeaux = Troupeau::whereIn('user_id', $this->userVetsan())->get();
        $annees = $this->xDernieresAnnees(2);
        $card_especes = $this->vsoRepository->cardEspeces();
        return view('visites\vso', [
            "menu" => $menu,
            "troupeaux" => $troupeaux,
            "annees" => $annees,
            "listeItem" => $card_especes,
        ]);
    }
    
    public function modif(Request $request)
    {
        $this->vsoRepository->maj($request);
        return redirect()->back()->with('message', 'La mise à jour a été ');
    }
    
    public function remplitBv()
    {
        $this->vsoRepository->remplitBv();
        
        return redirect()->back();
    }
    
    public function remplitPr()
    {
        $this->vsoRepository->remplitPr();
        
        return redirect()->back();
    }
}
