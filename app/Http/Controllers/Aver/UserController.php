<?php

namespace App\Http\Controllers\Aver;

use App\Http\Controllers\Controller;

use App\Repositories\UsersRepository;

use App\Repositories\TroupeauxRepository;

use App\Repositories\EspecesRepository;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $usersRepository;
     protected $troupeauxRepository;
     protected $especesRepository;

    public function __construct(UsersRepository $usersRepository, TroupeauxRepository $troupeauxRepository, EspecesRepository $especesRepository)
    {
      $this->usersRepository = $usersRepository;
      $this->troupeauxRepository = $troupeauxRepository;
      $this->especesRepository = $especesRepository;
    }

    public function index()
    {
      $troupeaux = $this->troupeauxRepository->getListeTroupeaux();
      $especes = $this->especesRepository->getEspecesUtiles();
      return view('aver/listeUsers')->with([
        'troupeaux' => $troupeaux,
          'especes' => $especes,
        'titre' => 'Eleveurs Aver',
      ]);
    }

    public function admin()
    {
      $users = $this->usersRepository->getAdmin();

      
      return view('aver/listeUsers')->with([
        'users' => $users->all(),
        'titre' => 'Admin',
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aver/creerUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = $this->usersRepository->store($request->all());

      return view('aver/listeUsers')->with([
        'users' => $user->all()
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->usersRepository->getById($id);
        $troupeaux = $this->troupeauxRepository->getByIdUser($id);
        $nombreTroupeaux = $this->troupeauxRepository->countTroupeauUnUser($id);
        return view('aver\showUser')->with([
        'user' => $user,
        'nombreTroupeaux' => $nombreTroupeaux,
        'troupeaux' => $troupeaux,
//        'activite' => $activite,
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
      $user = $this->usersRepository->getById($id);
        return view('aver/editUser',[
          'user' => $user,
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
        $this->usersRepository->update($id, $request->all());
        return redirect('aver/user')->withOk("Les informations ont été modifiées");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepository->destroy($id);
        return redirect('aver/user')->withOk("Cet éleveur a bien été supprimé");
    }

    public function majNbTroupeau()
    {
      $nombreTroupeaux = $this->troupeauxRepository->getNombreTroupeauParUser();
      $this->usersRepository->inscritNombreTroupeauParUser($nombreTroupeaux);
      return redirect('aver/user');
    }
    
    public function supprimerEleveur($id)
    {
      $this->usersRepository->supprimerEleveur($id);
      return redirect()->back();
    }

    public function toutSupprimer($listeId)
    {
      $nbSuppr = $this->usersRepository->supprimerListeEleveur($listeId);
      return view('fevec\toutSupprimer', ['nbSuppr' => $nbSuppr ]);
    }
}
