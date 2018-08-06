<?php

namespace App\Http\Controllers\Aver\Admin\Intermede;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proto;
use App\Models\Eleveur;
use App\Models\Eleveur_proto;
use App\Models\User;
use App\Http\Controllers\Aver\Admin\Intermede\IntermedeRep;

class IntermedeController extends Controller
{
        
    protected $interRep;
    
    public function __construct(IntermedeRep $interRep)
    {
        $this->interRep = $interRep;
    }
    
    public function index()
    {

        return view('aver.admin.intermede.intermedeAfficheEleveur',[
            
        ]
            );
    }
    
    public function correspondanceNom()
    {
        $this->interRep->tableCorrespondanceEleveurs();
        
        return redirect()->back();
    }
    
    public function correspondanceProto()
    {
        $this->interRep->correspondanceProto();
        
        return redirect()->back();
    }
}
