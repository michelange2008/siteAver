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

trait UserVetsan
{
    public function userVetsan()
    {
        $user_vetsan = User::select('id')->where('vetsan', true)->get();
        foreach($user_vetsan as $uv)
        {
            $tab[] = $uv->id;
        }
        return $tab;
    }
}
