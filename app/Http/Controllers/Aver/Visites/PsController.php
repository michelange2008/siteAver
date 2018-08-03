<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especes;
use App\Models\Ps;
use App\Models\Troupeau;
use App\Traits\EspecesPresentes;
use App\Repositories\Visites\PsRep;
// use Validator;
    
class PsController extends Controller
{
    use EspecesPresentes;
    
    protected $psRep;
    
    public function __construct(PsRep $psRep)
    {
        $this->psRep = $psRep;
    }
    
    public function index()
    {
        $listePs = Ps::all(); 

        return view('visites.ps', [
            'menu' => "",
            'listePs' => $listePs,
            'listeEspeces' => $this->listeEspecesPresentes(),
        ]);
    }
    
    public  function modif(Request $request)
    {
        $this->psRep->enregistre($request);
 
        return redirect()->back()->with('message', 'les modifications ont été enregistrées');
    }
    
    public function create()
    {
        return view('visites.psAjout', [
            'listeEspeces' => $this->listeEspecesPresentes(),
        ]);
    }
    
    public function store(Request $request) 
    {
        $this->psRep->store($request);
        
        return redirect()->route('ps.index');
    }

    
    public function destroy($id)
    {
        $this->psRep->destroy($id);
        
        return redirect()->back()->with('message', 'ce protocole de soin a bien été supprimé');
    }
}
