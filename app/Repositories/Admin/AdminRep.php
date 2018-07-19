<?php

namespace App\Repositories\Admin;

use App\Models\Troupeau;

class AdminRep 
{
    public function listeEleveurs()
    {
        $troupeaux = Troupeau::all();
        $listeEleveurs = $troupeaux;
        
        return $listeEleveurs;
    }
}