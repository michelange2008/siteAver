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
    public function cinqDernieresAnnees()
    {
        $apres = Carbon::now()->addYear(1);
        $avant = Carbon::now()->addYears(-4);
        $annees = Anneeprophylo::where('debut', '>', $avant)->where('debut', '<', $apres)->get();
        return $annees;
    }
}
