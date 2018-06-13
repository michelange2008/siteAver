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
     * Fournit les 5 dernières années de prophylaxie
     */
    public function cinqDernieresAnnees()
    {
        $apres = $this->anneeActuelle()->addYear(1); //Carbon::now()->addYear(0);
        $avant = Carbon::now()->addYears(-5);
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
}
