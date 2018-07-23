<?php
namespace app\Traits;

trait EdeFormat
{
    
    public function formatEde($ede)
    {
        $edeTab = str_split($ede);
        if(is_array($edeTab) && count($edeTab) == 8)
        {
            return $edeTab[0].$edeTab[1]." ".$edeTab[2].$edeTab[3].$edeTab[4]." ".$edepart_3 = $edeTab[5].$edeTab[6].$edeTab[7];
        }else{
            return $ede;
        }
    }
    
}

