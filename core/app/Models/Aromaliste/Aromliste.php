<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Aromliste extends Model
{
  public $timestamps = false;
  protected $guarded = [];

  public function formation()
  {
    return $this->belongsTo(Formation::class);
  }

  public function produit()
  {
    return $this->belongsTo(Produit::class);
  }
}
