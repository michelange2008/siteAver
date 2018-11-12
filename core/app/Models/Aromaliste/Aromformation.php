<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromformation extends Model
{
  public $timestamps = false;
  protected $guarded = [];
  protected $table = 'aromformations';

  public function listes()
  {
    return $this->hasMany(Liste::class);
  }

  public function preparations()
  {
    return $this->belongsToMany(AromPreparation::class);
  }

}
