<?php
namespace App\Repositories\Troupeaux;

use App\Models\Troupeau;
use App\Models\User;
use App\Models\Anneeprophylo;
use App\Traits\PeriodeProphylo;
use App\Repositories\Visites\ModifProphyloVso;
use App\Factories\Analyses\AnalyseMetadatas;

class TroupeauAffichageRep
{
  use PeriodeProphylo;
  use AnalyseMetadatas;

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
