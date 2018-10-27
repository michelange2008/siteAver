<?php

namespace App\Http\Controllers\Aver\Fichiers\Ordonnances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdonnancesController extends Controller
{
    
    public function index($id_troupeau)
    {
        return "ordonnances";
    }
}
