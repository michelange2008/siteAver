<?php

namespace App\Traits;
/*
 * Attribue la valeur vrai au champ 'vetsan' (est vétérinaire sanitaire' 
 * à tous les éleveurs en convention
 * Cette méthode est appelée dans la page de gestion des données FEVEC.
 */
use App\Models\User;

/**
 * Description of MajVetSan
 *
 * @author michel
 */
trait MajVetSan
{
    public function majVetsan()
    {
        $users = User::where('admin', 0)->get(); // recherche tous les utilisateurs non admin
        $nbModif = 0;
        foreach ($users as $user)
        {
            if($user->vetsan == null && $user->activite->abbreviation == 'CONV') // Si vetsan est null et que l'éleveur est en convention
            {
                $user->vetsan = true; // on passe vetsan à vrai
                $user->save();
                $nbModif++;
            }
        }
        return $nbModif;
    }
}
