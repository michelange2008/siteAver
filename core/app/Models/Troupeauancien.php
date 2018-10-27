<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Troupeauancien extends Model
{
    protected $table = "troupeauancien"; 
    
//     public function protos()
//     {
//         return $this->belongsToMany(Proto::class);
//     }
    
    public function bilans()
    {
        return $this->hasMany(Bilan::class);
    }
    
    public function eleveur()
    {
        return $this->belongsTo(Eleveur::class);
    }
    public function troupeaux()
    {
        return $this->belongsToMany(Troupeau::class);
    }
    public function protosfaits()
    {
        return $this->hasMany(Protosfait::class);
    }
}
