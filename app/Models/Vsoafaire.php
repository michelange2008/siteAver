<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vsoafaire extends Model
{
    protected $table = "vsoafaire";
    
    protected $guarded = [];
    
    public function troupeaux()
    {
        return $this->belongsTo(Troupeau::class);
    }

}
