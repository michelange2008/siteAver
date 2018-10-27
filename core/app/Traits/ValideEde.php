<?php
namespace app\Traits;

trait ValideEde
{
    public function valideEde($ede)
    {
        if($regex = preg_match("/([0-9]){8}/", $ede))
        {
            return $ede;
        }
        else 
        {
            return "00000000";
        }
        
    }
}

