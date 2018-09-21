<?php
namespace app\Factories\Sceaux;

use App\Factories\Sceaux\Sceau;
use App\Constantes\ConstSceaux;
use App\Factories\Analyses\AnalyseMetadatas;

class SceauAnalyses extends Sceau
{
    
    use AnalyseMetadatas;
    

    public function __construct($id_troupeau)
    {
        
        parent::__construct($id_troupeau);
        
        $this->identite = ConstSceaux::ANA_IDENTITE;
        $this->titre = ConstSceaux::ANA_TITRE;
        $this->soustitre = ConstSceaux::ANA_SOUSTITRE.$this->nbAnalysesSelonId($id_troupeau);
        $this->icone = ConstSceaux::ANA_ICONE;
        
        $this->setBouton(ConstSceaux::ANA_BOUTON);
        
        $this->parametre = $this->nbAnalysesSelonId($id_troupeau);
        
        if($this->parametre > 0)
        {
            $this->texteAdmin = ConstSceaux::ANA_TEXTE_ADMIN_VRAI;
            $this->texteUser = ConstSceaux::ANA_TEXTE_USER_VRAI;
        }
        else
        {
            $this->texteAdmin = ConstSceaux::ANA_TEXTE_ADMIN_FAUX;
            $this->texteUser = ConstSceaux::ANA_TEXTE_USER_FAUX;
        }
        
        $this->setTexte();
        
    }
}

