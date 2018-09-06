<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Visites\VisitesSousMenuRepository;
use App\Repositories\Visites\VsoRepository;

use App\Models\Troupeau;
use App\Traits\SortTroupeaux;

class VsoController extends Controller
{
    use \App\Traits\PeriodeProphylo;
    use \App\Traits\UserVetsan;
    use \App\Traits\CardGroupeEspeces;
    use SortTroupeaux;

    protected $vsoRepository;

    public function __construct(VsoRepository $vsoRepository)
    {
        $this->vsoRepository = $vsoRepository;
    }

    public function index(){
        $menu = VisitesSousMenuRepository::vsoAccueil();
        $troupeaux = $this->sortTroupeauxVetSan();
        $annees = $this->xDernieresAnneesCiviles(2);
        $cardGroupesEspece = $this->listCardGroupeEspece();
        return view('visites/vso', [
            "menu" => $menu,
            "troupeaux" => $troupeaux,
            "annees" => $annees,
            'cardGroupesEspece' => $cardGroupesEspece,
        ]);
    }

    public function modif(Request $request)
    {
        $this->vsoRepository->maj($request);
        return redirect()->back()->with('message', 'La mise à jour a été ');
    }

    public function remplitBv()
    {
        $this->vsoRepository->remplitBv();

        return redirect()->back();
    }

    public function remplitPr()
    {
        $this->vsoRepository->remplitPr();

        return redirect()->back();
    }
}
