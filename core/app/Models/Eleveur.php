<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleveur extends Model
{
    protected $table = 'eleveurs';
    
    public function troupeauanciens()
    {
        return $this->hasMany(Troupeauancien::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
