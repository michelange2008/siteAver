<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Visite\ProphyloRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Outils\RempliAnneesProphylo;

use App\Models\Troupeau;
use App\Models\Anneeprophylo;

class ProphyloController extends Controller
{
    use \App\Traits\PeriodeProphylo;

    protected $prophyloRepository;

    public function __construct(ProphyloRepository $prophyloRepository)
    {
        $this->prophyloRepository = $prophyloRepository;
    }    
    
    public function index() // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophyloSommaire();
        $listeItem = $this->prophyloRepository->itemProphylo();
        $troupeaux = Troupeau::all();
        return view('prophylo\sommaireProphylo', [
            'menu' => $menu,
            'listeItem' => $listeItem,
            'troupeaux' => $troupeaux
        ]);
    }
    
    public function changerProphylo($groupe) // RENVOIE LA PAGE AVEC LE FORMULAIRE POUR CHANGER LA PROPHYLAXIE
    {
        $menu = FevecSousmenuRepository::prophyloChanger();
        $troupeaux = Troupeau::all();
        $annees = $this->cinqDernieresAnnees();
        return view('prophylo\changerProphylo', [
            'menu' => $menu,
            'troupeaux' => $troupeaux,
            'annees' => $annees,
            'groupe' => $groupe,
        ]);
    }
    
    public function modifProphylo(Request $request)
    {
        $datas = $request->all();
        array_shift($datas);
        
        $nbAjout = $this->prophyloRepository->ajouteProphylo($datas);

        $nbSuppr = $this->prophyloRepository->enleveProphylo($datas);
        
        if($nbAjout == 0 && $nbSuppr == 0)
        {
            return redirect()->back()->with('rien', "Il n'y a pas eu d'ajout ou de suppression");
        }
        elseif($nbAjout != 0 && $nbSuppr == 0)
        {
            return redirect()->back()->with('message', "Il y a eu ".$nbAjout." ajout(s) et pas de suppression");
        }
        elseif($nbAjout == 0 && $nbSuppr != 0)
        {
            return redirect()->back()->with('message', "Il y a eu ".$nbSuppr." suppression(s) et aucun ajout");
        }
        else
        {
            return redirect()->back()->with('message', "Il n'y a eu ".$nbAjout." ajout(s) et ".$nbSuppr." suppression(s)");
        }
    }
    
    public function majProphyloBovines()
    {
        $troupeaux = Troupeau::all();
        $annees = Anneeprophylo::all();
        foreach($troupeaux as $troupeau)
        {
            if($troupeau->especes->abbreviation ===  'VA')
            {
                foreach($annees as $annee)
                {
                    $troupeau->anneeprophylos()->attach($annee->id);
                }
            }
        }
    }


    public function remplitAnnesProphylo()
    {
        $rempli = new RempliAnneesProphylo();
        $rempli->remplitTable();
    }
    
    

}
