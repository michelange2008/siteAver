<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anneevso_troupeau extends Model
{
    protected $table = "anneevso_troupeau";
    
      protected $fillable = [
      'id', 'troupeau_id', 'anneevso_id',
  ];
}
