<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protosfait extends Model
{
    protected $table = "protofaits";
    
    public function proto() {
        return $this->belongsTo(Proto::class);
    }
    public function troupeauancien()
    {
        return $this->belongsTo(Troupeauancien::class);
    }
}
