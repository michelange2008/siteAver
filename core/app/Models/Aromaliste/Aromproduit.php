<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromproduit extends Model
{
  public $timestamps = false;
  protected $guarded = [];

  public function categorie()
  {
    return $this->belongsTo(Aromcategorie::class);
  }
  public function unite()
  {
    return $this->belongsTo(Aromunite::class);
  }

}
