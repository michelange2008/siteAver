<?php

namespace App\Http\Controllers\Aver\Fichiers\Analyses;

use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Http\Controllers\Controller;
use App\Factories\FichierAnalyse;

class AnalysesController extends Controller
{
    use \App\Traits\AnalyseMetadatas;
    
    public function index($id)
    {
        $troupeau = Troupeau::find($id);
        $listeAnalyses = $this->analyseMetadatas();
        foreach ($listeAnalyses as $key => $analyse)
        {
            if($analyse->ede() != $troupeau->user->ede) $listeAnalyses->pull($key);
        }
        return view('aver.fichiers.analyses.analyses',[
            'listeAnalyses' => $listeAnalyses,
        ]);
    }
}
