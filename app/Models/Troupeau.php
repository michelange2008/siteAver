<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Factories\Blasons\Vso;

class Troupeau extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'user_id', 'races_id', 'especes_id', 'uiv', 'bsaimportant',
  ];
    protected $table = 'troupeaux';

    public function races()
    {
      return $this->belongsTo(Races::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function especes()
    {
      return $this->belongsTo(Especes::class);
    }
    
    public function anneeprophylos()
    {
        return $this->belongsToMany(Anneeprophylo::class);
    }
    
    public function anneevso()
    {
        return $this->belongsToMany(Anneevso::class);
    }
    
    public function bsas()
    {
        return $this->hasMany(Bsa::class);
    }
    public function troupeauanciens()
    {
        return $this->belongsToMany(Troupeauancien::class);
    }
    
    public function vsos()
    {
        return $this->hasMany(Vso::class);
    }
}
