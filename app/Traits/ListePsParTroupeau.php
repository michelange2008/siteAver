<?php
namespace App\Traits;

/**
 *
 * @author michel
 */
use App\Models\Bsa;
use App\Models\Troupeau;

trait ListePsParTroupeau
{
    public function listePsParTroupeau($id_troupeau)
    {
        if(Bsa::where('troupeau_id', $id_troupeau)->count() > 0)
        {
            $troupeau = Troupeau::find($id_troupeau);
            return $troupeau->pss();
        }
    }
        
}
