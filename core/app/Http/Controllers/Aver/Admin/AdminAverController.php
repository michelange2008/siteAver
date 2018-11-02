<?php

namespace App\Http\Controllers\Aver\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StatRepository;
use App\Traits\FevecDateMajBdd;
use App\Models\Bsa;
use App\Repositories\Admin\AdminRep;
use App\Traits\PeriodeProphylo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SortTroupeaux;


class AdminAverController extends Controller
{
    use FevecDateMajBdd;
    use PeriodeProphylo;
    use SortTroupeaux;

    protected $adminRep;

    public function __construct(AdminRep $adminRep)
    {
        $this->adminRep = $adminRep;
    }

    public function index()
    {
        $stats = StatRepository::calculStatEleveursTroupeaux();

        $listeBSA = Bsa::all();

        return view('aver.admin.admin', [
            'stats' => $stats,
            'dernMaJ' => $this->dernMaJEnMois(),
            'listeEleveurs' => $this->sortTroupeaux(),
            'listeBSA' => $listeBSA,
            'campagne' => $this->campagne(),
            'annee' => $this->dateActuelle()->year,
            'boutons' => $this->adminRep->boutons(),
        ]);

    }

}
