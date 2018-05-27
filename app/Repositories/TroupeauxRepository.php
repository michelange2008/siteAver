<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Troupeau;
use App\Models\Races;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;


class TroupeauxRepository
{
  protected $troupeau;

  public function __construct(Troupeau $troupeau)
  {
    $this->troupeau = $troupeau;
  }
  
  public function getListeTroupeaux()
  {
      return Troupeau::all();
  }

  public function getTroupeaux()
  {
    return $this->troupeau->where('user_id', Auth::user()->id)->get();
  }

  public function nbTroupeaux()
  {
    return Troupeau::where('user_id', Auth::user()->id)->count();
  }

  public function save(Troupeau $troupeau, Array $inputs)

  {
    $troupeau->especes_id = $inputs['especes_id'];
    $troupeau->races_id = $inputs['races_id'];
//    $troupeau->productions_id = $inputs['productions'];
//    $troupeau->effectif = $inputs['effectif'];
    $troupeau->uiv = $inputs['uiv'];
    $troupeau->user_id = $inputs['user_id']; // Auth::user()->id;
    $troupeau->save();
  }

  public function saveAverId(Troupeau $troupeau, Array $inputs)
  {
    $troupeau->especes_id = $inputs['especes_id'];
    $troupeau->races_id = $inputs['races_id'];
//    $troupeau->productions_id = $inputs['productions'];
//    $troupeau->effectif = $inputs['effectif'];
    $troupeau->uiv = $inputs['uiv'];
    $troupeau->user_id = $inputs['user_id']; // Auth::user()->id;
    $troupeau->id = $inputs['id'];
    $troupeau->save();
  }

  public function store(Array $inputs)
  {
    $troupeau = new $this->troupeau;

    $this->save($troupeau, $inputs);

    return $troupeau;
  }

  public function storeAvecId(Array $inputs)
  {
    $troupeau = new $this->troupeau;

    $this->saveAverId($troupeau, $inputs);

    return $troupeau;

  }

  public function getById($id)
  {
    return $this->troupeau->find($id);
  }

  public function update($id, Array $inputs)
  {
    $this->save($this->getById($id), $inputs);
  }

  public function destroy($id)
  {
    $this->getById($id)->delete();
  }

  public function destroyTroupeauxUnUser($id_user)
  {
    Troupeau::where('user_id', $id_user)->delete();
  }

  public function getByIdUser($idUser)
  {
    return Troupeau::where('user_id', $idUser)->get();
  }

  public function countTroupeauUnUser($idUser)
  {
    return Troupeau::where('user_id', $idUser)->count();
  }

  public function getNomRaces()
  {
    $racesRepository = new RacesRepository();
    return $racesRepository->getNomRaces();
  }
  public function getNomEspeces()
  {
    $especesRepository = new EspecesRepository();
    return $especesRepository->getNomEspeces();
  }

  public function getNomProductions()
  {
    $productionsRepository = new ProductionsRepository();
    return $productionsRepository->getNomProductions();
  }

  public function getNombreTroupeauParUser()
  {
    $liste = DB::table('troupeaux')
      ->select('user_id', DB::raw('count(*) as nb_tp'))
      ->groupBy('user_id')
      ->get();
    return $liste->all();
  }

  public function creerTroupeauSiAbsent($eleveur)
  {
    foreach ($eleveur['troupeaux'] as $troupeau) {
      Troupeau::firstOrCreate(['id' => $troupeau['id']], $troupeau);
    }
  }

}
