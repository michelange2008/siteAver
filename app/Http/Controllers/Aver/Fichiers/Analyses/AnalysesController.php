<?php

namespace App\Http\Controllers\Aver\Fichiers\Analyses;

use Illuminate\Http\Request;
use App\Models\Troupeau;
use App\Http\Controllers\Controller;
use App\Factories\Analyses\AnalyseMetadatas;
use App\Models\Analyse;
use App\Factories\Analyses\FichierAnalyse;
use Illuminate\Http\Response;


class AnalysesController extends Controller
{
    use AnalyseMetadatas;
    
    public function index()
    {
        
        $listeAnalyses = Analyse::all();
        return view('aver.admin.analysesToutes', [
            'listeAnalyses' => $listeAnalyses,
        ]);
    }
    
    public function parEleveur($user_id, $troupeau_id)
    {
        $listeAnalyses = Analyse::where('user_id', $user_id)->get();
           return view('aver.fichiers.analyses.analyses',[
            'listeAnalyses' => $listeAnalyses,
            'troupeau' => Troupeau::find($troupeau_id),
            
        ]);
    }
    
    public function telechargement($id, $fichier)
    {
        return Response()->download($fichier);
    }
    
    public function majAnalyses()
    {
        $listeAnalyses = $this->analyseMetadatas();
        $this->remplitBdd($listeAnalyses);
        return redirect()->back();
    }
}
