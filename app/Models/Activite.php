<?php

namespace App\Models;

use App\Models\ParamModels;
/**
 * Description of Activite
 *
 * @author michel
 */
class Activite extends ParamModels
{
    
    protected $table = 'activite';
    
     protected $fillable = [
        'id', 'nom', 'abbreviation', 'utile'
    ];
    
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
