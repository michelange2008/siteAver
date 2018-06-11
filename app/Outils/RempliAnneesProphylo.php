<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Outils;

/**
 * Description of rempliAnneesProphylo
 *
 * @author michel
 */
use App\Models\Anneeprophylo;
use Carbon\Carbon;

class RempliAnneesProphylo
{
    use \App\Traits\CreeCampagne;
    
    public function remplitTable()
    {
        for($i = 2012; $i < 2060; $i++ )
        {
            $debut = Carbon::createFromDate($i, 10, 01, 'Europe/Paris');
            $campagne = $this->creerUneCampagne($debut);
            $date = Carbon::createFromDate($i, 10, 01, 'Europe/Paris');
            $anneeprophyle = new Anneeprophylo();
            
            $anneeprophyle->debut = $date;
            $anneeprophyle->campagne = $campagne;
            $anneeprophyle->save();
        }
        
    }
}
