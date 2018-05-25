<?php

namespace App\Repositories;

use App\Models\User;

use App\Repositories\TroupeauxRepository;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;


class UsersRepository
{
  protected $user;

  public function __construct(User $user, TroupeauxRepository $troupeauxRepository)
  {
    $this->user = $user;
    $this->troupeauxRepository = $troupeauxRepository;
  }

  public function getUser()
  {
    return $this->user->all();
  }

  public function getAdmin()
  {
    return User::where('admin', 1)->get();
  }

  public function getEleveur()
  {
    return User::where('admin', 0)->orderBy('name')->get();
  }

  public function nbUser()
  {
    return User::count();
  }

  public function save(User $user, Array $inputs)

  {
    $user->name = $inputs['name'];
    $user->password = bcrypt($inputs['password']);
    $user->email = $inputs['email'];
    $user->ede = $inputs['ede'];
    $user->activite_id = $inputs['activite_id'];

    $user->save();
  }
  public function store(Array $inputs)
  {
    $user = new $this->user;

    $this->save($user, $inputs);

    return $user;
  }

  public function getById($id)
  {
    return User::where('id', $id)->first();
  }

  public function update($id, Array $inputs)
  {
    $this->save($this->getById($id), $inputs);
  }

  public function destroy($id)
  {
    $this->getById($id)->delete();
  }

  public function creerSiAbsent(Array $input)
  {
    $this->user->firstOrCreate(['id' => $input['id']], $input);
  }
  public function inscritNombreTroupeauParUser(Array $tableau)
  {
    foreach ($tableau as $value) {
      $user = User::find($value->user_id);
      $user->nb_tp = $value->nb_tp;
      $user->save();
    }
  }
  public function proposeSupprimerEleveur($listeEleveursFevec)
  {
    foreach ($listeEleveursFevec as $eleveurFevec) {
      $idEleveursFevec[] = $eleveurFevec->id;
    }
    $listeASupprimer = [];
    $listeEleveurs = $this->getEleveur();
    foreach ($listeEleveurs as $eleveur) {
      if(!in_array($eleveur->id, $idEleveursFevec))
      {
        $listeASupprimer[] = $eleveur;
      }
    }
    return $listeASupprimer;
  }
  public function supprimerEleveur($id_user)
  {
    $this->troupeauxRepository->destroyTroupeauxUnUser($id_user);
    $this->destroy($id_user);
  }
  
  public function supprimerListeEleveur($listeIdEleveur)
  {
      $i = 0;
      if($listeIdEleveur != null)
      {
        $liste = explode(',' , $listeIdEleveur);
        foreach ($liste as $id) {
          $i++;
          $this->supprimerEleveur($id);
        }
      }
      return $i;
  }

}
