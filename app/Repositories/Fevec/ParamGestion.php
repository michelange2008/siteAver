<?php

namespace App\Repositories\Fevec;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Collection;
use App\Models\ParamModels;
use App\Models\Activite;
use App\Models\Especes;
use App\Factories\ParamFevec\ParamFevec;
use App\Factories\ParamFevec\ParamFactory;
/**
 * Gère la présentation d'un formulaire pour choisir les types d'activité et d'especes
 * inscrit ensuite dans les tables de la bdd les infos modifiées
 * 
 * @author michel
 */
class ParamGestion
{
    
    // Récupère les infos des tables especes et activite pour construire le formulaire de cases à cocher
    public static function creeListeParam()
    {
        $paramActivite = new ParamFactory("Type d'activité", "ACT", "type_activite.svg", ParamFevec::creeListeActivite());
        $paramEspeces = new ParamFactory("Type d'espèces", "ESP", "type_especes.svg", ParamFevec::creeListeEspeces());
        $param = [$paramActivite, $paramEspeces];
        return $param;
    }
    
    // Récupère la réponse du formulaire de cases à cocher et écrit les données dans les tables
    public static function ecritParam($choix)
    {
        foreach($choix as $key => $id)
        {
            $keyTab = explode('_', $key); //récupère le groupe de parametre et l'id de ce paramètre
            $type = $keyTab[0]; 
            if($type == 'ACT')
            {
                $tab_act[] = intval($id);
            }elseif ($type == 'ESP')
            {
                $tab_esp[] = intval($id);
            }
        }
        self::ecrit(Activite::all(), $tab_act, new Activite() );
        self::ecrit(Especes::all(), $tab_esp, new Especes() );
    }
    
    private static function ecrit(Collection $listeParam, Array $listeChoix, ParamModels $table)
    {
        foreach($listeParam as $param)
        {
            if(in_array($param->id, $listeChoix))
            {
                $table->where('id', $param->id)->update(['utile' => true]);
            }
            else
            {
                $table->where('id', $param->id)->update(['utile' => false]);
                
            }
        }
    }
}
