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
use App\Models\Anneevso_troupeau;
use App\Models\Anneevso;
use App\Models\Troupeau;

class VsoRepository
{
    use \App\Traits\PeriodeProphylo;
    use \App\Traits\TabIdEspeces;
    
    public function cardEspeces()
    {
        $listeItem = [
            [
                'icone' => 'tete_tous.svg',
                'parametre' => ConstAnimaux::TS,
                'texte' => "Affiche toutes les espèces"
            ],
            [
                'icone' => 'tete_bovin.svg',
                'parametre' => ConstAnimaux::BV,
                'texte' => "N'affiche que les bovins"
            ],
            [
                'icone' => 'tete_ovin_caprin.svg',
                'parametre' => ConstAnimaux::PR,
                'texte' => "N'affiche que les petits ruminants"
            ],
            [
                'icone' => 'tete_Porc_volaille.svg',
                'parametre' => ConstAnimaux::BC,
                'texte' => "N'affiche que les porcs et les volailles"
            ]
        ];

        return $listeItem;
    }
    
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
                $anneevso_id = $ecorche[0];
                $troupeau_id = $ecorche[1];
                Anneevso_troupeau::firstOrCreate(['troupeau_id' => $troupeau_id, 'anneevso_id' => $anneevso_id]);
            }
        }
    }
    
    public function enleveVsoUser(Collection $collect_datas, $anneePrecedenteActive)
    {
        if($anneePrecedenteActive)
        {
            $liste_bdd = Anneevso_troupeau::all();
        }
        else
        {
            $anneeActuelle = $this->anneeActuelle();
            $anneevsoActuelle = Anneevso::where('debut', $anneeActuelle)->first();
            $liste_bdd = Anneevso_troupeau::where('anneevso_id', $anneevsoActuelle->id )->get();
        }
        foreach ($liste_bdd as $item)
        {
            $troupeau_id = $item->troupeau_id;
            $anneevso_id = $item->anneevso_id;
            if(!$collect_datas->contains($anneevso_id."_".$troupeau_id))
            {
                Anneevso_troupeau::destroy($item->id);
            }
        }
        
    }
    
    public function remplitBv()
    {
        $anneeActuelleVso = Anneevso::where('debut', $this->anneeActuelle())->get();
        $tabIdEspeces = $this->listeIdEspeces("BV");
        $troupeaux_bv = Troupeau::whereIn('especes_id', $tabIdEspeces)->get();
        foreach($troupeaux_bv as $troupeau_bv)
        {
            $troupeau_bv->anneevso()->detach($anneeActuelleVso);
            
            $troupeau_bv->anneevso()->attach($anneeActuelleVso);
        }
        
    }
    
    public function remplitPr()
    {
        $anneeActuelleVso = Anneevso::where('debut', $this->anneeActuelle())->first();
        $anneeNmoinsUnVso = Anneevso::where('debut', $this->anneeNmoinsUn())->first();
        $tabIdPR = $this->listeIdEspeces(ConstAnimaux::PR);
        $troupeaux_pr = Troupeau::whereIn('especes_id', $tabIdPR)->get();
        foreach($troupeaux_pr as $troupeau_pr)
        {
            $inListeActuelle = $troupeau_pr->anneevso->contains($anneeActuelleVso);
            $inListeNmoinsUn = $troupeau_pr->anneevso->contains($anneeNmoinsUnVso);
            
            if($inListeNmoinsUn && $inListeActuelle)
            {
                $troupeau_pr->anneevso()->detach($anneeActuelleVso);
            }
            elseif(!$inListeNmoinsUn && !$inListeActuelle)
            {
                $troupeau_pr->anneevso()->attach($anneeActuelleVso);
            }
        }
    }
}