<?php
namespace app\Factories\GestionFevec;

use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Factories\Sousmenu\SousmenuItem;

class CardGestionFevec
{
    protected $id;
    protected $titre;
    protected $icone;
    protected $texte;
    protected $bouton;
    protected $option;

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function titre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function icone()
    {
        return $this->icone;
    }

    /**
     * @return mixed
     */
    public function texte()
    {
        return $this->texte;
    }

    /**
     * @return mixed
     */
    public function bouton()
    {
        return $this->bouton;
    }

    /**
     * @return mixed
     */
    public function option()
    {
        return $this->option;
    }

    /**
     * @param mixed $titre
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $icone
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    /**
     * @param mixed $bouton
     */
    public function setBouton($route, $texte = 'voir', $couleur = SousmenuCouleurs::VERT)
    {
        $this->bouton = new SousmenuItem($route, $texte, $couleur);
    }

    /**
     * @param mixed $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }
}
