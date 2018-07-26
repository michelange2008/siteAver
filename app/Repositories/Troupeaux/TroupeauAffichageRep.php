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
use App\Factories\TroupeauCampagne;

class TroupeauAffichageRep
{

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
        $troupeauCampagne = new TroupeauCampagne();
        $troupeau = Troupeau::find($param['id_troupeau']);
        $user = User::find($troupeau->user_id);
        if(isset($param['vetsan']))
        {
            $vetsan = $param['vetsan'];
        }
        $prophylo = $param['prophylo'];
        $vso = $param['vso'];
        $bsaimportant = $param['bsaimportant'];
        
        $user->vetsan = $vetsan;
        $user->save();
        
    }
}
