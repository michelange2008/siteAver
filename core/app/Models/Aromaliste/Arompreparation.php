<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Arompreparation extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'arompreparations';

    public function formations()
    {
      return $this->belongsToMany(AromFormation::class);
    }

    public function produits()
    {
      return $this->belongsToMany(AromProduit::class);
    }
}
