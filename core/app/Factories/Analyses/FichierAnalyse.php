<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Factories\Analyses;

use Carbon\Carbon;
use App\Models\Codeanalyse;
/**
 * Classe qui présente les différents éléments des métadatas extraits du nom d'un fichier d'analyse en pdf
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
    protected $statut;
    
    public function __construct($nom_eleveur, $type_analyse, $ede, $id_analyse, $date, $link, bool $statut)
    {
        $this->nom_eleveur = $nom_eleveur;
        $this->id_analyse = $id_analyse;
        $this->ede = $ede;
        $this->type_analyse = $this->chercheCodeAnalyse($type_analyse);
        $this->date = $this->formatDate($date);
        $this->link = $link;
        $this->statut = $statut;
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
    public function statut()
    {
        return $this->statut;
    }
    public function chercheCodeAnalyse($id_analyse)
    {
        $codeanalyse = Codeanalyse::where('code', $id_analyse)->first();
        if($codeanalyse != null){
            return $codeanalyse->id;
        }else{
            return 102;
        }
    }
    public function formatDate($date)
    {
        Carbon::setToStringFormat('Y M d');
        $detailDate = explode('-', $date);
        if(count($detailDate) <3)
        {
            $dt = Carbon::createFromDate(0000, 01, 01);
        }
        else
        {
            $dt = Carbon::create($detailDate[2], $detailDate[1], $detailDate[0]);
        }
        $dt->formatLocalized("%e %b %Y");
        return $dt;
    }

}
