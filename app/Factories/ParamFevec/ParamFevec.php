<?php


namespace App\Factories\ParamFevec;

use App\Factories\ParamFevec\ParamFactory;
use App\Factories\ParamFevec\ParamEspeces;
use App\Factories\ParamFevec\ParamActivite;

/**
 * Description of ParamFevec
 * Permet de choisir les type d'especes et de relation (convention, suivi, etc.) à l'importation
 * @author michel
 */
class ParamFevec {
    
    protected $paramEspeces;
    protected $paramActivite;

    public static function creeListeEspeces()
    {
        return new ParamEspeces();
    }
    
    public static function creeListeActivite()
    {
        return new ParamActivite; 
    }

}
