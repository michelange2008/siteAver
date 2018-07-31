<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    protected $dates = [
      'date_analyse',
      'created_at',
      'updated_at',
    ];
    
    protected $guarded = [];
    
    protected $table = 'analyses';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
