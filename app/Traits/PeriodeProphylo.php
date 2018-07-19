<?php

/*
 * Crée la liste des 5 dernières années de prophylaxie
 */

namespace App\Traits;

/**
 *
 * @author michel
 */
use App\Models\Anneeprophylo;
use Carbon\Carbon;

trait PeriodeProphylo
{
    /*
     * Fournit les $nb-annees dernières années de prophylaxie
     */

    
    public function xDernieresAnnees($nb_annees)
    {
        $apres = $this->anneeActuelle()->addYear(1); //Carbon::now()->addYear(0);
        $avant = Carbon::now()->addYears(-$nb_annees);
        $annees = Anneeprophylo::where('debut', '>', $avant)->where('debut', '<', $apres)->get();
        return $annees;        
    }


    /* 
     * Renvoie la date de début de la prophylaxie (par rapport à la date actuelle et au 30 juin de l'année)
     */
    public function anneeActuelle()
    {
        $dateActuelle = Carbon::now();
//        $dateActuelle = Carbon::parse('2018-09-20');
        
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
    
    public function anneeNmoinsUn()
    {
        return $this->anneeActuelle()->subYear();
    }
    
    public function campagne()
    {
        $debut = $this->anneeActuelle();
        $fin = $this->anneeActuelle()->addYear(1);
        $campagne = $debut->year." - ".$fin->year;
        return $campagne;
    }
}
