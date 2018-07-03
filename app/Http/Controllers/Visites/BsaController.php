<?php

namespace App\Http\Controllers\Visites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\BsaRepository;

class BsaController extends Controller
{
    use \App\Traits\CardGroupeEspeces;
    
    protected $bsaRepository;
    
    public function __construct(BsaRepository $bsaRepository)
    {
        $this->bsaRepository = $bsaRepository;
    }

    public function index(){
        $troupeaux = $this->bsaRepository->listeBsa();
        $menu = VisitesSousMenuRepository::bsaAccueil();
        $cardGroupesEspece = $this->listCardGroupeEspece();
        return view('visites\bsa', [
            "menu" => $menu,
            'troupeaux' => $troupeaux,
            'cardGroupesEspece' => $cardGroupesEspece,
        ]);
    }
    
    public function modif(Request $request)
    {
        $modif = $this->bsaRepository->majBsa($request);
        
        return redirect()->back()->with('message', 'Il y a eu '.$modif['ajouts']. ' ajout(s) et '.$modif['suppressions'].' suppression(s).');
    }
}
