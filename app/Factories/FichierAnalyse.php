<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories;

/**
 * Classe qui présente les différents éléments des métadatas d'un fichier d'analyse en pdf
 *
 * @author michel
 */
class FichierAnalyse
{
    protected $nom_eleveur;
    protected $type_analyse;
    protected $ede;
    protected $id_analyse;
    protected $date;
    protected $link;
    
    public function __construct($nom_eleveur, $type_analyse, $ede, $id_analyse, $date, $link)
    {
        $this->nom_eleveur = $nom_eleveur;
        $this->type_analyse = $type_analyse;
        $this->ede = $ede;
        $this->id_analyse = $id_analyse;
        $this->date = $date;
        $this->link = $link;
    }
    public function nom_eleveur()
    {
        return $this->nom_eleveur;
    }

    public function type_analyse()
    {
        return $this->type_analyse;
    }
    
    public function id_analyse()
    {
        return $this->id_analyse;
    }

    public function ede()
    {
        return $this->ede;
    }
    
    public function date()
    {
        return $this->date;
    }
    public function link()
    {
        return $this->link;
    }
    
}
