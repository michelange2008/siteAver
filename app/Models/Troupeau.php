<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Troupeau extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'user_id', 'races_id', 'especes_id', 'uiv',
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
}
