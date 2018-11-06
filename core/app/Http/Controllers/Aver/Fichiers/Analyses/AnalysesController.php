<?php

namespace App\Http\Controllers\Aver\Fichiers\Analyses;

/*
 * Controller qui gère tout les redirections concernant les analyses: liste de toutes les analyses
 * liste des analyses d'un éleveur, téléchargement du pdf, mise à jour de la base de données.
 */

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
        return Storage::response($fichier);
    }

    public function majAnalyses()
    {
        $listeAnalyses = $this->analyseMetadatas();
        $this->remplitBdd($listeAnalyses);
        return redirect()->back();
    }
    public function changeImportant(Request $request)
    {
        $listeImportant = array_slice($request->all(),1);
        $listeAnalyses= Analyse::all();
        foreach($listeAnalyses as $analyse)
        {
            $id_checkbox = "cb_".$analyse->id;
            if(array_key_exists($id_checkbox, $listeImportant))
            {
                $analyse->important = true;
            }
            else
            {
                $analyse->important = false;
            }
            $analyse->save();
        }

        return redirect()->back();
    }
}
