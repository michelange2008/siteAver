<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Races extends Model
{

    public function troupeaux()
    {
      return $this->hasMany(Troupeau::class);
    }

    public function fev_troupeaux_n()
    {
      return $this->hasMany(Fev_troupeaux_n::class);
    }

    public function especes()
    {
      return $this->belongsTo(Especes::class);
    }
}
