<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veto extends Model
{
    protected $table = "vetos";
    
    protected $guarded =[];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
