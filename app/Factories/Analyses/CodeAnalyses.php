<?php
namespace app\Factories\Analyses;


trait CodeAnalyses
{
    protected $listeCodes = [
        1 => "prophylaxie",
        21 => "avortement (bovins)",
        22 => "pack intro",
        23 => "BVD (PCR)",
        82 => "avortement (PR)",
        "NA" => "coproscopie",
    ];
    
  
    public function litCode($code)
    {
        if($this->codeConnu($code))
        {
            return $this->listeCodes[$code];
        }
        else 
        {
            return $code;    
        }
    }
    
    public function codeConnu($code)
    {
        return array_key_exists($code, $this->listeCodes);
    }
}

