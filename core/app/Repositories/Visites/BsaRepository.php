<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Visites;

use App\Models\Troupeau;

/**
 * Description of bsaRepository
 *
 * @author michel
 */
class BsaRepository
{
    public function listeBsa()
    {
        return Troupeau::all();
    }
    
    public function majBsa($request)
    {
        $nb_ajout = $this->ajoutBsa($request);
        $nb_suppr = $this->supprBsa($request);
        $modif = [
            'ajouts' => $nb_ajout,
            'suppressions' => $nb_suppr,
        ];
        return $modif;
    }
    public function ajoutBsa($request)
    {
        $nb_ajout = 0;
        foreach ($request->all() as $key => $item)
        {
            $troupeau = Troupeau::find($key);
            if($troupeau!==null && $troupeau->bsa === 0)
            {
                $troupeau->bsa = 1;
                $troupeau->save();
                $nb_ajout++;
            }
        }
        return $nb_ajout;
    }
    public function supprBsa($request)
    {
        $listeCollect = collect($request->all());
        $nb_suppr = 0;
        $troupeaux = Troupeau::select('id')->get();
        foreach($troupeaux as $troupeau)
        {
            if(!$listeCollect->contains($troupeau->id))
            {
                $troupeau->bsa = 0;
                $troupeau->save();
                $nb_suppr++;
            }
        }
        return $nb_suppr;
    }
}
