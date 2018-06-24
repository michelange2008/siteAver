<?php

namespace App\Http\Controllers\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\VsoRepository;

use App\Models\Troupeau;

class VsoController extends Controller
{
    use \App\Traits\PeriodeProphylo;
    
    protected $vsoRepository;
    
    public function __construct(VsoRepository $vsoRepository)
    {
        $this->vsoRepository = $vsoRepository;
    }

    public function index(){
        $menu = VisitesSousMenuRepository::vsoAccueil();
        $troupeaux = Troupeau::all();
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
        
    }

}
