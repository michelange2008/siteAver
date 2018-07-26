<?php
namespace app\Factories;

class TroupeauCampagne
{
    protected $prophylo;
    protected $vso;
    protected $dernierBsa;

    public function __construct($prophylo = false, $vso = false, $dernierBsa = null)
    {
        $this->prophylo = $prophylo;
        $this->vso = $vso;
        $this->dernierBsa = $dernierBsa;
    }
    /**
     * @return string
     */
    public function prophylo()
    {
        return $this->prophylo;
    }

    /**
     * @return string
     */
    public function vso()
    {
        return $this->vso;
    }

    /**
     * @return string
     */
    public function dernierBsa()
    {
        return $this->dernierBsa;
    }

    /**
     * @param string $prophylo
     */
    public function setProphylo($prophylo)
    {
        $this->prophylo = $prophylo;
    }

    /**
     * @param string $vso
     */
    public function setVso($vso)
    {
        $this->vso = $vso;
    }

    /**
     * @param string $dernierBsa
     */
    public function setDernierBsa($dernierBsa)
    {
        $this->dernierBsa = $dernierBsa;
    }

 
}

