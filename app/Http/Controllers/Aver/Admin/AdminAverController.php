<?php

namespace App\Http\Controllers\Aver\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StatRepository;
use App\Outils\MajDateMajFevec;

use App\Repositories\Admin\AdminRep;
use App\Traits\PeriodeProphylo;

use App\Factories\Sousmenu\SousmenuFactory;
use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuCouleurs;

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

        return view('aver.admin.admin', [
            'stats' => $stats,
            'dernMaJ' => MajDateMajFevec::dernMaJEnMois(),
            'listeEleveurs' => $listeEleveurs,
            'annee' => $this->campagne(),
            'boutons' => $this->boutons(),
        ]);
        
    }
    
    public function boutons()
    {
        $boutons = new SousmenuFactory("boutons");
        $liste = [
            "Eleveurs non vét. san." => SousmenuCouleurs::GRIS,
            "Prophylo" => SousmenuCouleurs::BLEU,
            "VSO" => SousmenuCouleurs::BLEU,
            "BSA imp." => SousmenuCouleurs::ORANGE,
            "BSA non faits" => SousmenuCouleurs::ROUGE,
        ];
        foreach($liste as $key => $value){
            $sousmenuItem = new SousmenuItem("#", $key, $value);
            $boutons->addSousmenuItem($sousmenuItem);
        }
        return $boutons;
    }
}
