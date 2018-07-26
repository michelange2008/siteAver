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
use App\Factories\FichierAnalyse;

trait AnalyseMetadatas
{
    public function analyseMetadatas()
    {
        $url = 'pdf/analyses/';
        $dir = array_slice(scandir($url), 2);
        $listeAnalyses = collect();
        foreach($dir as $item)
        {
            $nom = explode(".", $item)[0];
            $metadatas = explode("_", $nom);
            if(count($metadatas) === 5)
            {
                $fichierAnalyse = new FichierAnalyse($metadatas[0], $metadatas[1], $metadatas[2], $metadatas[3], $metadatas[4], $item);
                $listeAnalyses->push($fichierAnalyse);
            }
        }
        return $listeAnalyses;
    }
}
