<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromcategorie extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function produits()
    {
      return $this->hasMany(Aromproduit::class);
    }
}
