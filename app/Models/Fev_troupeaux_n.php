<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fev_troupeaux_n extends Model
{
    protected $table = 'fev_troupeaux_n';

    protected $fillable = [
        'id', 'user_id', 'races_id', 'especes_id', 'uiv',
    ];

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

}
