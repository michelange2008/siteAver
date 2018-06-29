<?php

/*
 * Renvoie un tableau avec la liste des id Especes correspondant à un groupe définit dans COnstAnimaux
 */

namespace App\Traits;

/**
 *
 * @author michel
 */
use App\Models\Especes;

trait TabIdEspeces
{
    public function listeIdEspeces($groupe)
    {
        $liste = Especes::select('id')->where('groupe', $groupe)->get();
        if($liste->isEmpty())
        {
            dd("Attention le groupe recherché n'existe pas");
        }else{
            foreach($liste as $espece)
            {
                $listeIdEspeces[] = $espece->id;
            }
        }
        return $listeIdEspeces;
        
    }
}
