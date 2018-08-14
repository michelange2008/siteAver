<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits;

/**
 *
 * @author michel
 */
use App\Models\User;
use App\Models\Troupeau;

trait SortTroupeaux
{
    public function sortTroupeaux()
    {
        $users = User::select('id', 'name')->orderBy('name')->get();
                
        $troupeaux = Troupeau::all();
        
        $sortTroupeaux = collect();
        foreach ($users as $user)
        {
            foreach ($troupeaux as $troupeau)
            {
                if($user->id === $troupeau->user_id)
                {
                    $sortTroupeaux->push($troupeau);
                }
            }
        }
        
        return $sortTroupeaux;
    }
}
