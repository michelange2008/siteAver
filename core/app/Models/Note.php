<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    public function troupeau()
    {
      return $this->belongsTo(Troupeau::class);
    }

}
