<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\Analyses;

/**
 *
 * @author michel
 */
use App\Factories\Analyses\FichierAnalyse;
use App\Models\Troupeau;
use App\Traits\ChercheEdeAvecNom;

trait AnalyseMetadatas
{
    use ChercheEdeAvecNom;
    
    public function analyseMetadatas()
    {
        $url = 'pdf/analyses/';
        $dir = array_slice(scandir($url), 2);
        $listeAnalyses = collect();
        foreach($dir as $item)
        {
            $pathinfo = pathinfo($item);
            if(isset($pathinfo['extension']) && $pathinfo['extension'] === "pdf")
            {
                $filename = $pathinfo['filename'];
                $metadatas = explode("_", $filename);
                if(count($metadatas) > 4)
                {
                    if($metadatas[2] === "NA")
                    {
                        $ede = $this->chercheEde($metadatas[0]);
                        if(null != $ede)
                        {
                            $fichierAnalyse = new FichierAnalyse($metadatas[0], $metadatas[1], $ede, "", $metadatas[2], $item, true);
                            $listeAnalyses->push($fichierAnalyse);
                        }
                        else 
                        {
                            $fichierAnalyse = new FichierAnalyse($item, "","NA","","", "", false);
                            $listeAnalyses->push($fichierAnalyse);
                        }
                    }
                    else {
                        $fichierAnalyse = new FichierAnalyse($metadatas[0], $metadatas[1], $metadatas[2], $metadatas[3], $metadatas[4], $item, true);
                        $listeAnalyses->push($fichierAnalyse);
                    }
                }
                elseif (count($metadatas) === 4)
                {
                    $ede = $this->chercheEde($metadatas[0]);
                    if(null != $ede)
                    {
                        $fichierAnalyse = new FichierAnalyse($metadatas[0], $metadatas[1], $ede, "", $metadatas[2], $item, true);
                        $listeAnalyses->push($fichierAnalyse);
                    }
                    else
                    {
                        $fichierAnalyse = new FichierAnalyse($item, "","","","", "", false);
                        $listeAnalyses->push($fichierAnalyse);
                    }
                }
                elseif(count($metadatas) === 3)
                {
                    $ede = $this->chercheEde($metadatas[0]);
                    if(null != $ede)
                    {
                        $fichierAnalyse = new FichierAnalyse($metadatas[0], $metadatas[1], $ede, "", $metadatas[2], $item, true);
                        $listeAnalyses->push($fichierAnalyse);
                    }
                    else
                    {
                        $fichierAnalyse = new FichierAnalyse($item, "","","","", "", false);
                        $listeAnalyses->push($fichierAnalyse);
                    }
                }
                else {
                    $fichierAnalyse = new FichierAnalyse($item, "","","","", "", false);
                    $listeAnalyses->push($fichierAnalyse);
                }
                
            }
        }
        return $listeAnalyses;
    }
    
    public function analysesSelonId($id_troupeau)
    {
        $troupeau= Troupeau::find($id_troupeau);
        $listeAnalyses = $this->analyseMetadatas();
        foreach ($listeAnalyses as $key => $analyse)
        {
            if($analyse->ede() != $troupeau->user->ede) $listeAnalyses->pull($key);
        }
        return $listeAnalyses;
    }
    
    public function nbAnalysesSelonId($id_troupeau)
    {
        return $this->analysesSelonId($id_troupeau)->count();
    }
    
}
