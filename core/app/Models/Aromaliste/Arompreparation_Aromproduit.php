<?php

namespace App\Models\Aromaliste;

use Illuminate\Database\Eloquent\Model;

class Arompreparation_Aromproduit extends Model
{
  public $timestamps = false;
  protected $guarded = [];
  protected $table = "arompreparation_aromproduit";

  public function unite()
  {
    return $this->belongsTo(AromUnite::class);
  }
}
