<?php
namespace App\Factories\Sceaux;

use Illuminate\Support\Collection;

class SceauxListe extends Collection
{
    protected $sceauxListe;
    protected $liste;
    protected $sceauActivite;
    protected $sceauVetsan;
    protected $sceauProphylo;
    protected $sceauBsaimportant;
    protected $sceauAnalyses;
    protected $sceauVso;
    protected $sceauBsaPs;
    protected $sceauNotes;

    public function __construct($id_troupeau) {

        $this->sceauxListe = collect();

        $this->sceauActivite = new SceauActivite($id_troupeau);
        $this->sceauVetsan = new SceauVetsan($id_troupeau);
        $this->sceauProphylo = new SceauProphylo($id_troupeau);
        $this->sceauBsaimportant = new SceauBsaimportant($id_troupeau);
        $this->sceauAnalyses = new SceauAnalyses($id_troupeau);
        $this->sceauVso = new SceauVso($id_troupeau);
        $this->sceauBsaPs = new SceauBsaPs($id_troupeau);
        $this->sceauNotes = new SceauNotes($id_troupeau);
        $this->liste = [
            $this->sceauActivite,
            $this->sceauVetsan,
            $this->sceauProphylo,
            $this->sceauBsaimportant,
            $this->sceauVso,
            $this->sceauBsaPs,
            $this->sceauAnalyses,
            $this->sceauNotes,
        ];

    }

    public function construitListeComplete()
    {
        foreach ($this->liste as $sceau)
        {
            $this->sceauxListe->put($sceau->identite(), $sceau);
        }
    }

    public function construitListeSpeciale($type)
    {
        foreach ($this->liste as $sceau)
        {
            if($sceau->type() === $type)
            {
                $this->sceauxListe->put($sceau->identite(), $sceau);
            }
        }
    }

    public function cacheSceau($nom)
    {
        foreach ($this->liste as $sceau)
        {
            if($nom === $sceau->identite())
            {
                $sceau->setAffichage(false);
            }
        }
    }

    public function listeSceaux()
    {
        return $this->sceauxListe;
    }

}
