<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Repositories\Fevec\FevecConstantes;

trait FevecTelecharge
{
    
    public function telecharge_fichier(Request $request)
    {
        // Valide la saisie
        $request->validate([
            'fichier' => 'required|file',
        ]);
        $file = $request->file('fichier');
        
        // Copie le fichier àl'emplacement voulu
        $file->move('bdd', FevecConstantes::BDD_AVER_ORIGINE);
        
        flash("Fichier importé")->success();
    }
    
    public function videTables_fev()
    {
        foreach(FevecConstantes::ENTETE_MODIFIE as $entete)
        {
            DB::table($entete)->truncate();
            flash("Table ".$entete." vidée")->success();
        }

    }
    
}

