<?php

namespace App\Http\Controllers\Aver\Fichiers\Analyses;

use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Http\Controllers\Controller;
use App\Factories\Analyses\AnalyseMetadatas;
use App\Factories\Analyses\FichierAnalyse;
use Illuminate\Http\Response;

class AnalysesController extends Controller
{
    use AnalyseMetadatas;
    
    public function index()
    {
        $listeAnalyses = $this->analyseMetadatas();
        return view('aver.admin.analysesToutes', [
            'listeAnalyses' => $listeAnalyses,
        ]);
    }
    
    public function parEleveur($id)
    {
        $troupeau = Troupeau::find($id);
        $listeAnalyses = $this->analysesSelonId($id);
        return view('aver.fichiers.analyses.analyses',[
            'listeAnalyses' => $listeAnalyses,
            'troupeau' => $troupeau,
            
        ]);
    }
    
    public function telechargement($id, $fichier)
    {
        return Response()->download($fichier);
    }
}
