<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proto extends Model
{
    protected $table = 'protos';
    
 
    public function ps()
    {
        return $this->belongsToMany(Ps::class);
    }
    
    public function bilans()
    {
        return $this->belongsToMany(Bilan::class);
    }
    
    public function protosfaits()
    {
        return $this->hasMany(Protosfait::class);
    }
}
