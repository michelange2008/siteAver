<?php
namespace app\Repositories\Visites;

use App\Factories\CompteurModif;
use App\Traits\PeriodeProphylo;
use App\Models\Troupeau;
use App\Models\Anneeprophylo;
use App\Models\Anneeprophylo_troupeau;
use App\Models\Anneevso;
use App\Models\Vsoafaire;
use Carbon\Carbon;
use App\Models\Vso;


class ModifProphyloVso
{

    use PeriodeProphylo;
    
    protected $campagne;
    protected $troupeau_id;
    protected $compteur;

    public function __construct($campagne, $troupeau_id)
    {
        $this->campagne = $campagne;
        $this->troupeau_id = $troupeau_id;
        $this->compteur = new CompteurModif();
        
    }
    /*
     * Changer le statut d'un éleveur vis à vis de la prophylo d'une annee donnée et incrémenter le nombre de changements
     */
    public function modifProphylo($prophylo)
    {
        $ligne = Anneeprophylo_troupeau::where('anneeprophylo_id', $this->campagne)
            ->where('troupeau_id', $this->troupeau_id)
            ->get();
        $troupeau = Troupeau::find($this->troupeau_id);
        
        if($prophylo && count($ligne) === 0)
        {
            $troupeau->anneeprophylos()->attach($this->campagne);
            $this->compteur->incrementAjout();
        }
        elseif(!$prophylo && count($ligne) > 0)
        {
            $id = $ligne->first->anneeprophylo_id->id;
            $troupeau->anneeprophylos()->detach($this->campagne);
            $this->compteur->incrementSuppr();
        }
        return $this->compteur;
    }
    /*
     * Changer le statut d'un éleveur vis à vis de la vso d'une annee donnée et incrémenter le nombre de changements
     */
    public function modifVso($vsoAChanger)
    {
        $annee = Carbon::now();
        
        $ligne = Vsoafaire::where('annee', $annee)
        ->where('troupeau_id', $this->troupeau_id)
        ->get();
        $troupeau = Troupeau::find($this->troupeau_id);
        if($vsoAChanger && count($ligne) === 0)
        {
            $vso = new Vsoafaire();
            $vso->troupeau_id = $this->troupeau_id;
            $vso->annee = $annee->year;
            $vso->save();
            $this->compteur->incrementAjout();
        }
        elseif(!$vsoAChanger && count($ligne) > 0)
        {
            Vsoafaire::destroy($ligne->first()->id);
            $this->compteur->incrementSuppr();
        }
        return $this->compteur;
    }
    
    
}

