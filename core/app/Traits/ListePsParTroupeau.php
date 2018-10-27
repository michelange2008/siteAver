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
        $listePs = collect();
        $reqBsa = Bsa::where('troupeau_id', $id_troupeau);
        if($reqBsa->count() > 0)
        {
            foreach($reqBsa->get() as $bsa)
            {
              foreach($bsa->pss as $ps)
              {
                $listePs->push($ps);
              }
            }

        }
        return $listePs;
    }
}
