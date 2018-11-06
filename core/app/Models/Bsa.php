<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bsa extends Model
{
    protected $table = "bsa";
    
    protected $fillable = ['id', 'troupeau_id', 'date_bsa', 'delaiBSA', 'date_anniv'];
    
    public function troupeau()
    {
        return $this->belongsTo(Troupeau::class);
    }
    public function pss()
    {
        return $this->belongsToMany(Ps::class);
    }
}


