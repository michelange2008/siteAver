<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromunite extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function produits()
    {
      return $this->hasMany(AromProduit::class);
    }
}
