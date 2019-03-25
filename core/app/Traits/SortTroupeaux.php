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
use App\Traits\EdeFormat;

trait SortTroupeaux
{
  use EdeFormat;

    public function sortTroupeaux()
    {
        return $this->sort(Troupeau::all());
    }

    public function sortTroupeauxVetSan()
    {
        return $this->sort(Troupeau::whereIn('user_id', $this->userVetsan())->get());
    }

    public function sort($troupeaux)
    {
        $users = User::select('id', 'name')->orderBy('name')->get();

        $sortTroupeaux = collect();

        foreach ($users as $user)
        {
            foreach ($troupeaux as $troupeau)
            {
                if($user->id === $troupeau->user_id)
                {
                  $troupeau->user->ede = $this->formatEde($troupeau->user->ede);
                    $sortTroupeaux->push($troupeau);
                }
            }
        }

        return $sortTroupeaux;
    }
}
