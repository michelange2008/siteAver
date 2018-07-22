<?php
namespace App\Factories\Blasons;

use Illuminate\Support\Collection;

class BlasonsListe extends Collection
{
    protected $blasons_liste;
    
    public function addBlason(Blasons $blason)
    {
        $this->blasons_liste[$blason->getIdentite()] = $blason;
    }
    
    public function blasonsListe()
    {
        return $this->blasons_liste;
    }
}