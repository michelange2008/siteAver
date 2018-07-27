<?php
namespace app\Repositories\Visites;

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
    protected $nbAjout;
    protected $nbSuppr;

    public function __construct($anneeProphylo_id, $troupeau_id, $nbAjout = 0, $nbSuppr = 0)
    {
        $this->anneeProphylo_id = $anneeProphylo_id;
        $this->troupeau_id = $troupeau_id;
        $this->nbAjout = $nbAjout;
        $this->nbSuppr = $nbSuppr;
        
    }
    /*
     * Changer le statut d'un éleveur vis à vis de la prophylo d'une annee donnée et incrémenter le nombre de changements
     */
    public function modifProphylo($prophylo)
    {
        $ligne = Anneeprophylo_troupeau::where('anneeprophylo_id', $anneeprophylos_id)
            ->where('troupeau_id', $troupeaux_id)
            ->get();
        if($prophylo && count($ligne) === 0)
        {
            $troupeau = Troupeau::find($troupeaux_id);
            $troupeau->anneeprophylos()->attach($anneeprophylos_id);
            $this->nbAjout++;
        }
        elseif(!$prophylo && count($ligne) > 0)
        {
            $troupeau->anneeprophylos()->detach($ligne->anneeprophylo_id);
            $this->nbSuppr++;
            
        }
        return $this->compteur;
    }
    
    
}

