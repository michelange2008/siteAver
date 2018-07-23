<?php

namespace App\Http\Controllers\Aver\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StatRepository;
use App\Outils\MajDateMajFevec;
use App\Models\Bsa;
use App\Repositories\Admin\AdminRep;
use App\Traits\PeriodeProphylo;


class AdminAverController extends Controller
{
    use MajDateMajFevec;
    use PeriodeProphylo;
    
    protected $adminRep;
    
    public function __construct(AdminRep $adminRep)
    {
        $this->adminRep = $adminRep;
    }
    
    public function index()
    {
        $stats = StatRepository::calculStatEleveursTroupeaux();
        $listeEleveurs = $this->adminRep->listeEleveurs();
        $listeBSA = Bsa::all();
        return view('aver.admin.admin', [
            'stats' => $stats,
            'dernMaJ' => MajDateMajFevec::dernMaJEnMois(),
            'listeEleveurs' => $listeEleveurs,
            'listeBSA' => $listeBSA,
            'annee' => $this->campagne(),
            'boutons' => $this->adminRep->boutons(),
        ]);
        
    }

}
