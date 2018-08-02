<?php

namespace App\Models;

use App\Models\ParamModels;

class Especes extends ParamModels
{
    public function troupeaux()
    {
      return $this->hasMany(Troupeau::class);
    }

    public function fev_troupeaux_n()
    {
      return $this->hasMany(Fev_troupeaux_n::class);
    }

    public function races()
    {
      return $this->hasMany(Races::class);
    }
    
    public function ps()
    {
        return $this->belongsToMany(Ps::class);
    }
}
