<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Activite;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
    
    public function troupeau()
    {
        return $this->hasMany(Troupeau::class);
    }
    public function analyses()
    {
        return $this->hasMany(Analyse::class);
    }
    public function eleveurs()
    {
        return $this->belongsToMany(Eleveur::class);
    }
    public function veto()
    {
        return $this->hasOne(Veto::class);
    }
}
