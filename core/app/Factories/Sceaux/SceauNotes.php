<?php
namespace App\Factories\Sceaux;

/**
 * Description of SceauActivite
 *
 * @author michel
 */

use App\Constantes\ConstSceaux;
use App\Models\Troupeau;
use App\Models\Note;


class SceauNotes extends Sceau
{
    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);

        $this->identite = ConstSceaux::NOTE_IDENTITE;
        $this->titre = ConstSceaux::NOTE_TITRE;
        if($this->nbNotes($id_troupeau) == 0)
        {
          $this->texteAdmin = ConstSceaux::NOTE_TEXTE_ADMIN_FAUX;
          $this->texteUser = ConstSceaux::NOTE_TEXTE_USER_FAUX;
        } else {
          $this->titre = ConstSceaux::NOTE_TITRE;
          $this->texteAdmin = ConstSceaux::NOTE_TEXTE_ADMIN_VRAI;
          $this->texteUser = ConstSceaux::NOTE_TEXTE_USER_VRAI;
        }
        $this->setTexte();
        $this->type = ConstSceaux::TYPE_LIEN;
        $this->icone = ConstSceaux::NOTE_ICONE;
        $this->parametre = $this->nbNotes($id_troupeau);
        $this->setBouton(ConstSceaux::NOTE_BOUTON);
    }

    public function nbNotes($id_troupeau)
    {
      return Note::where('troupeau_id', $id_troupeau)
                    ->orderBy('updated_at', 'desc')
                    ->count();

    }
}
