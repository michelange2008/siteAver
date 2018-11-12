<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromproduit extends Model
{
  public $timestamps = false;
  protected $guarded = [];

  public function categorie()
  {
    return $this->belongsTo(Categorie::class);
  }
  public function listes()
  {
    return $this->hasMany(Liste::class);
  }

}
