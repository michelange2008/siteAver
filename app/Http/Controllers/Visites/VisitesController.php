<?php

namespace App\Http\Controllers\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\VisitesRepository;

class VisitesController extends Controller
{
    protected $visitesRepository;
    
    public function __construct(VisitesRepository $visitesRepository)
    {
        $this->visitesRepository = $visitesRepository;
    }


    public function index(){
        
        $liste = $this->visitesRepository->visitesCard();
        
        
        $menu = VisitesSousMenuRepository::visitesAccueil();
        return view('visites/visites', [
            'menu' => $menu,
            'liste' => $liste,
        ]);
    }
}
