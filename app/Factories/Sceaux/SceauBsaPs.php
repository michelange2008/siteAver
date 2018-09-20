<?php
namespace App\Factories\Sceaux;

/**
 * Description of SceauBsa
 *
 * @author michel
 */
use App\Models\Bsa;
use App\Models\Protosfait;
use App\Constantes\ConstSceaux;

class SceauBsaPs extends Sceau
{
    
    public function __construct($id_troupeau){
    
        parent::__construct($id_troupeau);
    
 $titre;
 $soustitre;
 $icone;
 $texte;
 $texteAdmin;
 $texteUser;
 $affichage;


        $this->identite = ConstSceaux::BSAPS_IDENTITE;
        $this->titre = ConstSceaux::BSAPS_TITRE;    
        $this->soustitre = ConstSceaux::BSAPS_SOUSTITRE.$this->nbPs($id_troupeau);
        $this->icone = ConstSceaux::BSAPS_ICONE;

        $this->setBouton(ConstSceaux::BSAPS_BOUTON);

        $this->setParametre($this->nbBsa($id_troupeau));
        
        
    }
    
    public function nbBsa($id_troupeau)
    {
        return Bsa::where('troupeau_id', $id_troupeau)->count();
    }
    
    public function nbPs($id_troupeau)
    {
        $bsas = Bsa::where('troupeau_id', $id_troupeau)->get();
        
    }


    public function dateDernierBsa($id_troupeau)
    {
        return BSA::where('troupeau_id', $id_troupeau)->get()->sortByDesc('date_bsa')->first();
    }
}
