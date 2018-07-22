<?php
namespace App\Factories\Blasons;

class Blasons
{
    protected $identite;
    protected $condition;
    protected $icone_vrai;
    protected $icone_faux;
    protected $alt_vrai;
    protected $alt_faux;
    protected $titre_vrai;
    protected $titre_faux;
    
    public function __construct($identite, $condition = false, $icone_vrai, $icone_faux, $alt_vrai, $alt_faux, $titre_vrai, $titre_faux)
    {
        $this->identite = $identite;
        $this->condition = $condition;
        $this->icone_vrai = $icone_vrai;
        $this->icone_faux = $icone_faux;
        $this->alt_vrai = $alt_vrai;
        $this->alt_faux = $alt_faux;
        $this->titre_vrai = $titre_vrai;
        $this->titre_faux = $titre_faux;
    }
    
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }
    /**
     * @return mixed
     */
    public function getIdentite()
    {
        return $this->identite;
    }

    /**
     * @return \phpDocumentor\Reflection\Types\Boolean
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return mixed
     */
    public function getIcone_vrai()
    {
        return $this->icone_vrai;
    }

    /**
     * @return mixed
     */
    public function getIcone_faux()
    {
        return $this->icone_faux;
    }

    /**
     * @return mixed
     */
    public function getAlt_vrai()
    {
        return $this->alt_vrai;
    }

    /**
     * @return mixed
     */
    public function getAlt_faux()
    {
        return $this->alt_faux;
    }

    /**
     * @return mixed
     */
    public function getTitre_vrai()
    {
        return $this->titre_vrai;
    }

    /**
     * @return mixed
     */
    public function getTitre_faux()
    {
        return $this->titre_faux;
    }

    
    
    
}