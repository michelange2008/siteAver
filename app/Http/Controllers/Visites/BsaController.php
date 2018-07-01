<?php

namespace App\Http\Controllers\Visites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\BsaRepository;

class BsaController extends Controller
{
    protected $bsaRepository;
    
    public function __construct(BsaRepository $bsaRepository)
    {
        $this->bsaRepository = $bsaRepository;
    }

    public function index(){
        
        $menu = VisitesSousMenuRepository::bsaAccueil();
        return view('visites\bsa', [
            "menu" => $menu,
        ]);
    }
}
