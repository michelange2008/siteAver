<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anneeprophylo extends Model
{
    public function troupeaux()
    {
        return $this->belongsToMany(Troupeau::class);
    }
    
}
