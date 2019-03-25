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
use App\Traits\ListePsParTroupeau;

class SceauBsaPs extends Sceau
{
    use ListePsParTroupeau;

    public function __construct($id_troupeau){

        parent::__construct($id_troupeau);

        $this->identite = ConstSceaux::BSAPS_IDENTITE;
        $this->titre = ConstSceaux::BSAPS_TITRE;
        $this->soustitre = ConstSceaux::BSAPS_SOUSTITRE.$this->nbPs($id_troupeau);
        $this->icone = ConstSceaux::BSAPS_ICONE;
        $this->type = ConstSceaux::TYPE_LIEN;

        $this->setBouton(ConstSceaux::BSAPS_BOUTON);

        $this->parametre = $this->nbBsa($id_troupeau);

        if($this->nbPs($id_troupeau) > 0)
        {
          $this->texteAdmin = ConstSceaux::BSAPS_TEXTE_ADMIN_VRAI;
          $this->texteUser = ConstSceaux::BSAPS_TEXTE_USER_VRAI;
        }
        else
        {
            $this->texteAdmin = ConstSceaux::BSAPS_TEXTE_ADMIN_FAUX;
            $this->texteUser = ConstSceaux::BSAPS_TEXTE_USER_FAUX;
        }
        $this->setTexte();
        $this->plus = ConstSceaux::BSAPS_PLUS;
        $this->plus_lien = ConstSceaux::BSAPS_PLUS_LIEN;

    }

    public function nbBsa($id_troupeau)
    {
        return Bsa::where('troupeau_id', $id_troupeau)->count();
    }

    public function nbPs($id_troupeau)
    {
        return $this->listePsParTroupeau($id_troupeau)->count();

    }


    public function dateDernierBsa($id_troupeau)
    {
        return BSA::where('troupeau_id', $id_troupeau)->get()->sortByDesc('date_bsa')->first();
    }
}
