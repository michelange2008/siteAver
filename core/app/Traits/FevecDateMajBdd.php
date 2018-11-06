<?php

/*
 * Inscrit la date de mise à jour de la bdd éleveurs à partir de la bdd fevec 
 */

namespace App\Traits;

/**
 * Description of MajDateMajFevec
 *
 * @author michel
 */
use App\Models\DateMaJFevec;
use Carbon\Carbon;

trait FevecDateMajBdd
{
    
    public function dateMaJ()
    {
        $dateMaJ = new DateMaJFevec();
        $dateMaJ->date = date("Y-m-d");
        $dateMaJ->save();
    }
    
    public static function getDateMaJ()
    {
        return Carbon::parse(DateMaJFevec::max('date'));
        
    }
    
    public static function diffNowEnMois(Carbon $date)
    {
        return $date->diffInMonths();
    }
   
    public function dernMaJEnMois()
    {
        return self::diffNowEnMois(self::getDateMaJ());
    }
    
}
