<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits;

/**
 * Description of CreeCampagne
 *
 * @author michel
 */
use Carbon\Carbon;

trait CreeCampagne
{
    public function creerUneCampagne(Carbon $debut)
    {
        return $debut->year.' - '.$debut->addYear()->year;
    }
}
