<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vso extends Model
{
    protected $table = 'vso';

    protected $guarded = [];

    public function troupeau()
    {
      return $this->belongsTo(Troupeau::class);
    }
}
