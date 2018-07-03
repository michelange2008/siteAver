<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fev_eleveurs_n extends Model
{
    protected $table = 'fev_eleveurs_n';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'ede', 'activite',
    ];

    public function fev_troupeaux_n()
    {
      $this->hasMany(Fev_troupeaux_n::class);
    }
}
