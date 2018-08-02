<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especes;
use App\Models\Ps;
use App\Models\Troupeau;
use App\Traits\EspecesPresentes;

class PsController extends Controller
{
    use EspecesPresentes;
    
    protected $psRep;
    
    public function index()
    {
        $listePs = Ps::all(); 

        return view('visites.ps', [
            'menu' => "",
            'listePs' => $listePs,
            'listeEspeces' => $this->listeEspecesPresentes(),
        ]);
    }
}
