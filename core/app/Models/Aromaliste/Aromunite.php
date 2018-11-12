<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromunite extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function preps_prods()
    {
      return $this->hasMany(AromPreparation_AromProduit::class);
    }
}
