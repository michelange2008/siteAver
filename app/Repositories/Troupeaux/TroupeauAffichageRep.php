<?php
namespace App\Repositories\Troupeaux;

use App\Factories\Blasons\BlasonsListe;

use App\Factories\Blasons\Vetsan;
use App\Factories\Blasons\Activite;
use App\Factories\Blasons\Prophylo;
use App\Factories\Blasons\Vso;
use App\Factories\Blasons\Bsaimportant;

use App\Models\Troupeau;
use App\Models\User;
use App\Models\Anneeprophylo;
use App\Traits\PeriodeProphylo;
use App\Repositories\Visites\ModifProphyloVso;
use App\Factories\Card\CardListe;
use App\Factories\Card\CardAnalyses;
use App\Factories\Card\CardOrdonnances;
use App\Factories\Card\CardFactures;
use App\Factories\Card\CardBsa;
use App\Factories\Analyses\AnalyseMetadatas;

class TroupeauAffichageRep
{
  use PeriodeProphylo;
  use AnalyseMetadatas;

    public function listeBlasons($id_troupeau)
    {
        $this->listeBlasons = new BlasonsListe();

        $this->listeBlasons->addBlason(new Activite($id_troupeau));
        $this->listeBlasons->addBlason(new Vetsan($id_troupeau));
        $this->listeBlasons->addBlason(new Prophylo($id_troupeau));
        $this->listeBlasons->addBlason(new Vso($id_troupeau));
        $this->listeBlasons->addBlason(new Bsaimportant($id_troupeau));

        return $this->listeBlasons;
    }
    
    public function listeCards($id_troupeau)
    {
        $nbAnalyses = $this->nbAnalysesSelonId($id_troupeau);
        
        $cardAnalyses = new CardAnalyses($id_troupeau);
        $cardAnalyses->setOption($nbAnalyses);
        $listeCards = new CardListe();
        $listeCards->addCard($cardAnalyses);
        $listeCards->addCard(new CardOrdonnances($id_troupeau));
        $listeCards->addCard(new CardBsa($id_troupeau));
        $listeCards->addCard(new CardFactures($id_troupeau));
        return $listeCards;
    }

    public function hasPlusTroupeau($id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        $eleveur = $troupeau->user->id;
        if(Troupeau::where('user_id', $eleveur)->count() >1)
        {
            $troupeauxAutres = Troupeau::where('user_id', $eleveur)->where('id','<>', $id_troupeau)->get();
            return $troupeauxAutres;
        }
    }

    public function modifParam($param)
    {
        $troupeau = Troupeau::find($param['id_troupeau']);
        $user = User::find($troupeau->user_id);
        $campagne = Anneeprophylo::where('campagne', $this->campagne())->get()->first();
        $vetsan = (isset($param['vetsan'])) ? 1 : 0;
        if($vetsan === 0)
        {
            $prophylo = 0;
            $vso = 0;
        }else{
            $prophylo = (isset($param['prophylo'])) ? 1 : 0;
            $vso = (isset($param['vso'])) ? 1 : 0;
        }
        $bsaimportant = (isset($param['bsaimportant'])) ? 1 : 0;

        $user->vetsan = $vetsan;
        $user->save();

        $troupeau->bsaimportant = $bsaimportant;
        $troupeau->save();
        
        $modifProphyloVso = new ModifProphyloVso($campagne->id, $troupeau->id);
        $modifProphyloVso->modifProphylo($prophylo);
        $modifProphyloVso->modifVso($vso);
        
    }
}
