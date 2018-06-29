<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ps extends Model
{
    protected $table = 'ps';
    
    protected $fillable = ['id', 'nom', 'fichier', 'especes_id'];
    
    public function espece()
    {
        return $this->belongsTo(Especes::class);
    }
}
