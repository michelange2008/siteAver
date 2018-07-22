<?php
namespace App\Repositories\Troupeaux;

use App\Factories\Blasons\BlasonsListe;

use App\Factories\Blasons\Vetsan;
use App\Factories\Blasons\Activite;
use App\Factories\Blasons\Prophylo;
use App\Factories\Blasons\Vso;
use App\Factories\Blasons\Bsaimportant;

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
}
