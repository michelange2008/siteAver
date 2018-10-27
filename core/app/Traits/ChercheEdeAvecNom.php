<?php
namespace App\Traits;

use App\Models\Troupeau;
use App\Models\User;

trait ChercheEdeAvecNom
{
    
    public function chercheEde($nom)
    {
        $user = User::where('name', $nom)->first();
        if($user != null)
        {
            return $user->ede;
        }
        else 
        {
            return null;
        }
    }
}

