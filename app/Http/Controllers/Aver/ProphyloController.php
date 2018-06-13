<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Visite\ProphyloRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Outils\RempliAnneesProphylo;
use App\Constantes\ConstAnimaux;

use App\Models\Troupeau;
use App\Models\Anneeprophylo;
use App\Models\Anneeprophylo_troupeau;

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
            'BV' => ConstAnimaux::BV,
        ]);
    }
    
    public function modifProphylo(Request $request)
    {
        $datas = $request->all();

        array_shift($datas);
        $groupe = array_shift($datas);

        $nbAjout = $this->prophyloRepository->ajouteProphylo($datas);

        $nbSuppr = $this->prophyloRepository->enleveProphylo($datas, $groupe);
        
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
    
    // remplit toutes les cases des prophylo de vaches allaitantes
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
    
    // Remplit les cases prophuylo en bovins allaitants pour l'année en cours
    public function remplitVAencours()
    {
        $annee = $this->anneeActuelle();
        $objet_annee = Anneeprophylo::where('debut', $annee)->first();
        $troupeauxVA = Troupeau::all();
        foreach($troupeauxVA as $troupeauVA)
        {
            if($troupeauVA->especes->abbreviation === ConstAnimaux::VA)
            {
                $troupeauVA->anneeprophylos()->detach($objet_annee);
                $troupeauVA->anneeprophylos()->attach($objet_annee);
                
                
            }
        }
        return redirect()->back();
    }

    // Avait juste pour fonction de remplir la table des années pour la gestion de la prophylaxie
    public function remplitAnnesProphylo()
    {
        $rempli = new RempliAnneesProphylo();
        $rempli->remplitTable();
    }
}
