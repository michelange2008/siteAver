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
    
    protected $anneeProphylo_id;
    protected $troupeau_id;
    protected $compteur;

    public function __construct($anneeProphylo_id, $troupeau_id)
    {
        $this->anneeProphylo_id = $anneeProphylo_id;
        $this->troupeau_id = $troupeau_id;
        $this->compteur = new CompteurModif();
        
    }
    /*
     * Changer le statut d'un éleveur vis à vis de la prophylo d'une annee donnée et incrémenter le nombre de changements
     */
    public function modifProphylo($prophylo)
    {
        $ligne = Anneeprophylo_troupeau::where('anneeprophylo_id', $this->anneeProphylo_id)
            ->where('troupeau_id', $this->troupeau_id)
            ->get();
        $troupeau = Troupeau::find($this->troupeau_id);
        if($prophylo && count($ligne) === 0)
        {
            $troupeau->anneeprophylos()->attach($this->anneeProphylo_id);
            $this->compteur->incrementAjout();
        }
        elseif(!$prophylo && count($ligne) > 0)
        {
            $troupeau->anneeprophylos()->detach($ligne->first->anneeprophylo_id->id);
            $this->compteur->incrementSuppr();
            
        }
        return $this->compteur;
    }
    
    
}

