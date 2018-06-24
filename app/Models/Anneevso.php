<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anneevso extends Model
{
    protected $table = 'anneevso';
    
    public function troupeaux()
    {
        return $this->belongsToMany(Troupeau::class);
    }
}
