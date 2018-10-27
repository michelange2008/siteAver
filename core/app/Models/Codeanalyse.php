<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codeanalyse extends Model
{
    protected $guarded = [];

    public function analyses()
    {
      return $this->hasMany(Analyse::class);
    }
}
