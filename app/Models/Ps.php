<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ps extends Model
{
    protected $table = 'ps';
    
    protected $fillable = ['id', 'nom', 'fichier'];
    
    public function especes()
    {
        return $this->belongsToMany(Especes::class);
    }
    public function bsas()
    {
        return $this->belongsToMany(Bsa::class);
    }
}
