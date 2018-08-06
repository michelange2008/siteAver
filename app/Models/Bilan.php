<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $table = 'bilans';
    
    public function troupeauancien()
    {
        return $this->belongsTo(Troupeauancien::class);
    }
    
    public function protos()
    {
        return $this->belongsToMany(Proto::class);
    }
}
