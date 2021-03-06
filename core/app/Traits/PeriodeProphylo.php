<?php

/*
 * Crée la liste des 5 dernières années de prophylaxie et plein d'autres méthodes correspondant aux prophylaxies, vso, etc.
 * en lien avec les dates et campagnes.
 */

namespace App\Traits;

/**
 *
 * @author michel
 */
use App\Models\Anneeprophylo;
use App\Factories\TroupeauCampagne;
use App\Models\Troupeau;
use Carbon\Carbon;

trait PeriodeProphylo
{
    /*
     * Fournit les $nb-annees dernières années de prophylaxie
     */


    /*
     * Renvoie la date de début de la prophylaxie (par rapport à la date actuelle et au 30 juin de l'année)
     */
    public function anneeActuelle()
    {
        $dateActuelle = Carbon::now();

        $annee = $dateActuelle->year;         // Crée le 30 juin de l'année en cours
        $limite = Carbon::parse($annee."-06-30");

        $diff = $limite->diffInDays($dateActuelle, false);         // Compare les deux dates

        if($diff > 0)
        {
            $anneeDebut = $annee;
        }
        else
        {
            $anneeDebut = $annee - 1;
        }
        $debut = Carbon::parse($anneeDebut.'-10-01');

        return $debut;
    }

    public function xDernieresAnnees($nb_annees)
    {
        $apres = $this->anneeActuelle()->addYear(1); //Carbon::now()->addYear(0);
        $avant = Carbon::now()->addYears(-$nb_annees);
        
        $annees = collect();
        for($i = $nb_annees-1 ; $i >= 0 ; $i-- )
        {
            $annee = Anneeprophylo::where('debut', $this->anneeActuelle()->addYear(-$i) )->first();
            $annees->push($annee);
        }
        return $annees;
    }
    
    public function xDernieresAnneesCiviles($nb_annees)
    {
        $anneesCiviles = collect();
        for($i = $nb_annees; $i >= 0 ; $i--)
        {
            $anneesCiviles->push($this->dateActuelle()->addYear(-$i));
        }
        
        return $anneesCiviles;
    }
    
    public function dateActuelle()
    {
        return Carbon::now();
    }

    public function anneeNmoinsUn()
    {
        return $this->anneeActuelle()->subYear();
    }
    /*
     * renvoie la campagne actuelle sous forme de string de type "2018 - 2019"
     */
    public function campagne()
    {
        $debut = $this->anneeActuelle();
        $fin = $this->anneeActuelle()->addYear(1);
        $campagne = $debut->year." - ".$fin->year;
        return $campagne;
    }
    /*
     * Renvoi un objet troupeauCampagne, cad les données d'un troupeau pour la campagne actuelle (prophylo, vso, date dernier bsa)
     */
    public function troupeauCampagne($id)
    {
        $troupeauCampagne = new TroupeauCampagne();
        $troupeau = Troupeau::find( $id);
        foreach($troupeau->anneeprophylos as $prophylo)
        {
            if($prophylo->campagne === $this->campagne())
            {
                $troupeauCampagne->setProphylo(true);
            }
        }
        foreach ($troupeau->vsoafaire as $vso)
        {
            if($vso->annee === Carbon::now()->year)
            {
                $troupeauCampagne->setVso(true);
            }
        }
        if($troupeau->bsa !== null)
        {
            $troupeauCampagne->setDernierBsa($troupeau->bsa->sortByDesc('date_bsa')->first()->date_bsa);
        }
        return $troupeauCampagne;
    }

}
