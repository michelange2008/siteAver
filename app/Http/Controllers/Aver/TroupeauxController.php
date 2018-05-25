<?php

namespace App\Http\Controllers\Aver;

use App\Http\Controllers\Controller;

use App\Http\Requests\TroupeauCreationRequest;
use App\Http\Requests\TroupeauUpdateRequest;

use App\Repositories\TroupeauxRepository;
use App\Repositories\RacesRepository;
use App\Repositories\EspecesRepository;
use App\Repositories\ProductionsRepository;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TroupeauxController extends Controller
{

  protected $troupeauxRepository;

    public function __construct(TroupeauxRepository $troupeauxRepository)
    {
      $this->troupeauxRepository = $troupeauxRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if($this->troupeauxRepository->nbTroupeaux() == 0)
      {
/*        return view('aver\creerTroupeau')->with([
          'especes' => $this->troupeauxRepository->getNomEspeces(),
          'races' => $this->troupeauxRepository->getNomRaces(),
          'productions' => $this->troupeauxRepository->getNomProductions(),
          'troupeaux' => $this->troupeauxRepository->getTroupeaux(),
        ])->withOk('coucou');
      }
      else {
*/        $troupeaux = $this->troupeauxRepository->getTroupeaux();
        return view('aver\troupeau')->with([
          'troupeaux' => $troupeaux->all(),
        ]);
//      }
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(isset($_GET['userId'])) $userId = $_GET['userId'];
      else $userId = Auth::user()->id;

      return view('aver\creerTroupeau')->with([
        'userId' => $userId,
        'especes' => $this->troupeauxRepository->getNomEspeces(),
        'races' => $this->troupeauxRepository->getNomRaces(),
        'productions' => $this->troupeauxRepository->getNomProductions(),
        'troupeaux' => $this->troupeauxRepository->getTroupeaux(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $troupeau = $this->troupeauxRepository->store($request->all());
      return redirect('aver\troupeau')->withOk('Le troupeau de '.$troupeau->especes['nom'].' a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $troupeaux = $this->troupeauxRepository->getByIdUser(Auth::user()->id);
      $troupeau = $this->troupeauxRepository->getById($id);
      return view('aver\showTroupeau')->with([
        'troupeaux' => $troupeaux,
        'troupeau' => $troupeau,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      return view('aver\editTroupeau')->with([
          'troupeau' => $this->troupeauxRepository->getById($id),
          'especes' => $this->troupeauxRepository->getNomEspeces(),
          'races' => $this->troupeauxRepository->getNomRaces(),
          'productions' => $this->troupeauxRepository->getNomProductions(),
          'troupeaux' => $this->troupeauxRepository->getTroupeaux(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->troupeauxRepository->update($id, $request->all());
        return redirect('aver\troupeau')->withOk('Le troupeau a été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->troupeauxRepository->destroy($id);
        return redirect('aver\troupeau')->withOk('Ce troupeau a bien été détruit');
    }

}
