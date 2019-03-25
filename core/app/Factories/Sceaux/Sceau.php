<?php
namespace App\Factories\Sceaux;

/**
 * Classe destinée à afficher les infos sur les éléments propres à un troupeau
 *
 * @author michel
 */
use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Models\Troupeau;

abstract class Sceau
{

    protected $troupeau; // objet Troupeau
    protected $identite; // identifie en un mot le sceau
    protected $titre; // décrit le sceau
    protected $soustitre; // ajouté pour le cas où ça serve à quelque chose
    protected $icone; // nom de l'icone du sceau avec adresse complète
    protected $texteAdmin;
    protected $texteUser;
    protected $texte; // description en détail du sceau
    protected $bouton; // bouton à cliquer objet SousmenuItem
    protected $parametre; // information supplémentaire (nombre d'analyses ou de protocoles de soin par exemple)
    protected $type; // définit le type de sceau: informatif ou avec lien cliquable ou autre (?)
    protected $affichage; // booléen précisant si ce sceau doit être affiché ou non
    protected $plus; // booléen qui précise s'il on affiche une icone plus pour ajouter un élément du sceau
    protected $plus_lien; // route liée au bouton plus

    public function __construct($id_troupeau)
    {
        $this->troupeau = Troupeau::find($id_troupeau);
        $this->affichage = true;
        $this->plus = false;
        $this->plus_lien = "";
    }

    public function setBouton($route, $texteBouton = 'voir', $sousmenuCouleur = SousmenuCouleurs::VERT)
    {
        $this->bouton = new SousmenuItem($route, $texteBouton, $sousmenuCouleur);

    }

    public function setTexte()
    {
        if(isset($this->texteAdmin) && isset($this->texteUser))
        {
        $this->texte = (Auth()->user()->admin) ? $this->texteAdmin : $this->texteUser;
        }
        else
        {
            $this->texte = "";
        }
    }

    public function setAffichage(bool $affiche)
    {
        $this->affichage = $affiche;
    }

    public function troupeau()
    {
        return $this->troupeau;
    }

    public function identite()
    {
        return $this->identite;
    }

    public function titre()
    {
        return $this->titre;
    }

    public function soustitre()
    {
        return $this->soustitre;
    }

    public function icone()
    {
        return $this->icone;
    }

    public function texte()
    {
        return $this->texte;
    }

    public function bouton()
    {
        return $this->bouton;
    }

    public function parametre()
    {
        return $this->parametre;
    }

    public function type()
    {
        return $this->type;
    }

    public function affichage()
    {
        return $this->affichage;
    }
    public function plus()
    {
      return $this->plus;
    }
    public function plus_lien()
    {
      return $this->plus_lien;
    }
}
