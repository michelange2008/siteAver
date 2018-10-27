<?php
namespace App\Repositories\Admin;

use App\Factories\Graphiques;
use App\Factories\StatFactory;

class StatRepository 
{
    
    // METHODES CONCERNANT LES STATISTIQUES ########################################
    public static function calculStatEleveursTroupeaux()
    {
        $stat = [];

        $stat = SELF::statEleveurs();
        return $stat;
    }

    private static function statEleveurs()
    {

        $convSuiv = Graphiques::creeGraph('donut', "types d'éleveurs", StatFactory::convSuiv());
        $nbTpDiff = Graphiques::creeGraph('donut', "espèces (nombre de troupeaux)", StatFactory::nbTpDiff());
        $uivParEsp = Graphiques::creeGraph('donut', "especes (nombre d'UIV)", StatFactory::uivParEsp());
        $stats['graph'][] = $convSuiv;
        $stats['graph'][] = $nbTpDiff;
        $stats['graph'][] = $uivParEsp;
        return $stats;
    }

}
