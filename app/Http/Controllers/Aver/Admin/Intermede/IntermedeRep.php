<?php
namespace app\Http\Controllers\Aver\Admin\Intermede;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Eleveur;
use App\Models\Proto;
use App\Models\Ps;
use App\Models\Troupeauancien;
use App\Models\Bilan;
use App\Models\Bsa;
use App\Models\Troupeau;
use App\Models\Protosfait;

class IntermedeRep
{
    
    
    public function tableCorrespondanceEleveurs()
    {
        DB::table('eleveur_user')->truncate();

        $listeAnciensEleveurs = Eleveur::all();
        $listeNouveauxEleveurs = User::all();
        foreach ($listeAnciensEleveurs as $ancien)
        {
            foreach ($listeNouveauxEleveurs as $user)
            {
                if($ancien->nom == $user->name)
                {
                    if($user->eleveurs->isEmpty())
                    {
                        $user->eleveurs()->attach($ancien->id);
                    }
                }
            }
        }
    }
    
    public function correspondanceTroupeaux()
    {
        $troupeauxanciens = Troupeauancien::all();
        foreach($troupeauxanciens as $tpancien)
        {
            $eleveur = $tpancien->eleveur;
            if($eleveur->users->count() > 0)
            {
                $user = $eleveur->users->first();
                $troupeauxnouveaux = $user->troupeau;
                foreach($troupeauxnouveaux as $tpnouveau)
                {
                    if($tpnouveau->especes->abbreviation == $tpancien->abbreviation)
                    {
                        if($tpnouveau->troupeauanciens->count() == 0)
                        {
                            $tpnouveau->troupeauanciens()->attach($tpancien->id);
                        }
                    }
                }
                
            }
        }
    }
    
    public function correspondanceProto()
    {
        DB::table('proto_ps')->truncate();
        
        $listeProto = Proto::all();
        $fichierProto = collect();
        foreach ($listeProto as $proto)
        {
            $fichierProto->push($proto->fichier);
        }
        $listePs = Ps::all();
        $fichierPs = collect();
        $i = 1;
        foreach ($listePs as $key => $ps)
        {
            $fichierPs->push($ps->fichier);
        }

        $fichiersAbsents = $fichierProto->diff($fichierPs);
        
        if($fichiersAbsents->count() == 0)
        {
            foreach($listeProto as $proto)
            {
                foreach ($listePs as $ps)
                {
                    if($proto->fichier === $ps->fichier)
                    {
                        $ps->protos()->attach($proto->id);
                    }
                }
            }
        }
    }
    
    public function copyBilan()
    {
        $bilans = Bilan::all();
        //On parcours tous les bilans
        foreach ($bilans as $bilan)
        {
            // On en déduit l'id du troupeau ancien
            $troupeauancien = Troupeauancien::find($bilan->troupeau_id);
            // Si ce troupeau à une correspondance dans la tableau des troupeaux nouveaux
            if($troupeauancien->troupeaux->count() > 0)
            {
                // et on transfert le bsa
                $bsa = new Bsa();
                $bsa->firstOrCreate(['troupeau_id' => $troupeauancien->troupeaux->first()->id, 'date_bsa' => $bilan->date]);
            }
        }
    }
    
    public function copyProto()
    {
        $i = 0;
        $protosfaits = Protosfait::all();
        foreach ($protosfaits as $protofait)
        {
            $proto = $protofait->proto;
            $ps = $proto->ps->first();
            $protofait_date = Carbon::createFromTimeString($protofait->proto_date);
            $protofait_tp = $protofait->troupeauancien_id;
            $troupeauancien = Troupeauancien::find($protofait_tp);
            
            if($troupeauancien->troupeaux->count() > 0){
                $troupeaunouveau_id = $troupeauancien->troupeaux->first()->id;
                $bsas = Bsa::where('troupeau_id', $troupeaunouveau_id)->get();
                foreach ($bsas as $bsa)
                {
                    $annee = Carbon::createFromFormat('Y-m-d',$bsa->date_bsa)->year;
                    if($protofait_date->year == $annee)
                    {
                       $ps->bsas()->attach($bsa->id);
                    }
                }
            }
        }
        echo $i;
    }
    
}

