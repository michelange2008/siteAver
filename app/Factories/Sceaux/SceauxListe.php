<?php
namespace App\Factories\Sceaux;

use Illuminate\Support\Collection;
use App\Factories\Sceaux\SceauActivite;
use App\Factories\Sceaux\SceauVetsan;
use App\Factories\Sceaux\SceauBsaimportant;
use App\Factories\Sceaux\SceauProphylo;
use App\Factories\Sceaux\SceauBsaPs;
use App\Factories\Sceaux\SceauAnalyses;

class SceauxListe extends Collection
{
    protected $sceauxListe;
    
    protected $sceaux = [];
    
    public function __construct($id_troupeau) {
        $this->sceaux = [
            new SceauActivite($id_troupeau),
            new SceauVetsan($id_troupeau),
            new SceauProphylo($id_troupeau),
            new SceauBsaimportant($id_troupeau),
            new SceauAnalyses($id_troupeau),
            new SceauVso($id_troupeau),
            new SceauBsaPs($id_troupeau),
        ];
    }

    public function addsceaux()
    {
        foreach($this->sceaux as $sceau)
        {
            if($sceau->affichage)
            {
                $this->sceauxListe[$sceau->id()] = $sceau;
            }
        }
    }
    
    public function sceauxListe()
    {
        return $this->sceauxListe;    
    }
    
}

