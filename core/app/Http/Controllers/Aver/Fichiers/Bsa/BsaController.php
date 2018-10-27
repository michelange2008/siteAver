<?php

namespace App\Http\Controllers\Aver\Fichiers\Bsa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Troupeau;
use App\Models\Bsa;
use Illuminate\Support\Facades\DB;

class BsaController extends Controller
{
    
    public function index($user_id, $id_troupeau)
    {
        $troupeau = Troupeau::find($id_troupeau);
        $bsas = Bsa::where('troupeau_id', $id_troupeau)->get();

        return view('aver.fichiers.bsa.bsa', [
            'troupeau' => $troupeau,
            'bsas' => $bsas,
        ]);
    }
    
}
