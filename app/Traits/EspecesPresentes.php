<?php
namespace app\Traits;

use App\Models\Troupeau;
use App\Models\Especes;

trait EspecesPresentes
{
    
    public function listeEspecesPresentes()
    {
        $troupeaux = Troupeau::select('especes_id')->get();
        
        $listeEspecesPresentes = collect();
        
        foreach($troupeaux as $troupeau)
        {
            $listeEspecesPresentes->push($troupeau->especes->id);
        }
        $listeEspeces = Especes::whereIn('id', $listeEspecesPresentes->unique())->get();
        
        return $listeEspeces;
    }
}

