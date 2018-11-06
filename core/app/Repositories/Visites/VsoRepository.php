<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Visites;

/**
 * Description of vsoRepository
 *
 * @author michel
 */
use Illuminate\Support\Collection;

use App\Constantes\ConstAnimaux;
use App\Models\Anneevso;
use App\Models\Troupeau;
use App\Models\Vsoafaire;

class VsoRepository
{
    use \App\Traits\PeriodeProphylo;
    use \App\Traits\TabIdEspeces;
    
    public function maj($request)
    {
        $datas = $request->all();
        $collect_datas = collect($datas);
        $anneePrecedenteActive = $datas['cache'];
        $this->ajouteVsoUser($datas);
        $this->enleveVsoUser($collect_datas, $anneePrecedenteActive);
        
    }
    
    public function ajouteVsoUser($datas)
    {
        foreach ($datas as $annee_troupeau)
        {
            $ecorche = explode('_', $annee_troupeau);
            if(isset($ecorche[1]))
            {
                $anneevso = $ecorche[0];
                $troupeau_id = $ecorche[1];
                Vsoafaire::firstOrCreate(['troupeau_id' => $troupeau_id, 'annee' => $anneevso]);
            }
        }
    }
    
    public function enleveVsoUser(Collection $collect_datas, $anneePrecedenteActive)
    {
        if($anneePrecedenteActive)
        {
            $liste_bdd = Vsoafaire::all();
        }
        else
        {
            $anneeActuelle = $this->dateActuelle();
            $liste_bdd = Vsoafaire::where('annee', $anneeActuelle)->get();
        }
        foreach ($liste_bdd as $item)
        {
            $troupeau_id = $item->troupeau_id;
            $anneevso = $item->annee;
            if(!$collect_datas->contains($anneevso."_".$troupeau_id))
            {
                Vsoafaire::destroy($item->id);
            }
        }
        
    }
    
    public function remplitBv()
    {
        $troupeaux_bv = Troupeau::whereIn('especes_id', $this->listeIdEspeces("BV"))->get();
        
        foreach($troupeaux_bv as $troupeau_bv)
        {
            $vsoBvActuel = Vsoafaire::where('annee', $this->dateActuelle()->year)->where('troupeau_id', $troupeau_bv->id)->get();
            
            if($vsoBvActuel->isEmpty())
            {
                $vsoAfaire = new Vsoafaire();
                
                $vsoAfaire->troupeau_id = $troupeau_bv->id;
                
                $vsoAfaire->annee = $this->dateActuelle()->year;
                
                $vsoAfaire->save();
                
            }
        }
    }
    
    public function remplitPr()
    {
        $troupeaux_pr = Troupeau::whereIn('especes_id', $this->listeIdEspeces(ConstAnimaux::PR))->get();

        foreach($troupeaux_pr as $troupeau_pr)
        {
            $vsoAFaireAnneeActuelle = Vsoafaire::where('annee', $this->dateActuelle()->year)
                                                    ->where('troupeau_id', $troupeau_pr->id)
                                                    ->get();
            
            $vsoAfaireAnneeNMoinsUn = Vsoafaire::where('annee', ($this->dateActuelle()->year - 1))
                                                    ->where('troupeau_id', $troupeau_pr->id)
                                                    ->get();
            if($vsoAfaireAnneeNMoinsUn->isEmpty() && $vsoAFaireAnneeActuelle->isEmpty())
            {
                $vsoAfaire = new Vsoafaire();
                
                $vsoAfaire->troupeau_id = $troupeau_pr->id;
                
                $vsoAfaire->annee = $this->dateActuelle()->year;
                
                $vsoAfaire->save();
                
            }
            elseif($vsoAfaireAnneeNMoinsUn->isNotEmpty() && $vsoAFaireAnneeActuelle->isNotEmpty())
            {
                Vsoafaire::destroy($vsoAFaireAnneeActuelle->first()->id);
            }

//             if($inListeNmoinsUn && $inListeActuelle)
//             {
//                 $troupeau_pr->anneevso()->detach($anneeActuelleVso);
//             }
//             elseif(!$inListeNmoinsUn && !$inListeActuelle)
//             {
//                 $troupeau_pr->anneevso()->attach($anneeActuelleVso);
//             }
        }

    }
}