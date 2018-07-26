<?php

namespace App\Http\Controllers\Aver\Fichiers\Analyses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Factories\FichierAnalyse;

class AnalysesController extends Controller
{
    use \App\Traits\AnalyseMetadatas;
    
    public function index($id)
    {
        $listeAnalyses = $this->analyseMetadatas();
        dd($listeAnalyses);
        return view('aver.fichiers.analyses.analyses',[
            'url' => $url,
        ]);
    }
}
