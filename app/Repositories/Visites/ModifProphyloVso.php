<?php
namespace app\Repositories\Visites;

use App\Factories\CompteurModif;
use App\Traits\PeriodeProphylo;
use App\Models\Troupeau;
use App\Models\Anneeprophylo;
use App\Models\Anneeprophylo_troupeau;
use App\Models\Anneevso;
use App\Models\Anneevso_troupeau;


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
    public function modifVso($vso)
    {
        $ligne = Anneevso_troupeau::where('anneevso_id', $this->campagne)
        ->where('troupeau_id', $this->troupeau_id)
        ->get();
        $troupeau = Troupeau::find($this->troupeau_id);
        if($vso && count($ligne) === 0)
        {
            $troupeau->anneevso()->attach($this->campagne);
            $this->compteur->incrementAjout();
        }
        elseif(!$vso && count($ligne) > 0)
        {
            $id = $ligne->first->anneevso_id->id;
            $troupeau->anneevso()->detach($this->campagne);
            $this->compteur->incrementSuppr();
        }
        return $this->compteur;
    }
    
    
}

