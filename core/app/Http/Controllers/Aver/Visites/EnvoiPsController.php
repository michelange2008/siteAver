<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\EnvoiPs;
use App\Mail\MailToAntikor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Factories\PdfFactory\PsConstruitPdf;
use App\Models\Troupeau;
use App\Models\Ps;
use App\Models\Veto;
use App\Models\User;
use App\Models\Bsa;
use Carbon\Carbon;
use App\Traits\VerifieAdresseMail;

class EnvoiPsController extends Controller
{
  use VerifieAdresseMail;

  public function envoiPs($troupeau_id, $bsa_id, $ps_id)
  {
    $troupeau = Troupeau::find($troupeau_id);
    $bsa = Bsa::find($bsa_id);
    $ps = Ps::find($ps_id);
    // tester si adresse mail valide

    if(!$this->verif($troupeau->user->email) || $this->nomail($troupeau->user->email))
    {
      // Demander une adresse mail
      return view('visites.modifEmail', [
        "troupeau" => $troupeau,
        "bsa" => $bsa,
        "ps" => $ps,
      ]);
    } else {

      $this->envoie($troupeau, $bsa, $ps);
      $message = "Le protocole de soin \"".$ps->nom."\" a été envoyé à ".$troupeau->user->name;
      return redirect(route('bsa.ps', ['troupeau_id' => $troupeau->id, 'bsa_id' => $bsa->id]))
                ->with('message',$message);
    }
  }
  /*
  // Envoi le mail avec le ps à l'éleveur
  */
  public function envoie($troupeau, $bsa, $ps)
  {
    Mail::to($troupeau->user->email)->send(
      new EnvoiPs(Auth::user(),
      $this->affichePsUnEleveur($troupeau->user, $bsa, $ps),
      $ps->nom)
    );

  }
  /*
  // crée un pdf avec le ps d'un éleveur donné pour un bsa donné
  */
  public function affichePsUnEleveur($user, $bsa, $ps)
  {
      $date = $bsa->date_bsa;
      $dateTab = explode("-", $date);
      $dateEntiere = Carbon::createFromDate($dateTab[0], $dateTab[1], $dateTab[2]);
      $veto = Veto::where('id', $bsa->veto_id)->first();
      $construitPdf = new PsConstruitPdf();
      $construitPdf->Header();
      $construitPdf->creeFichierPdf($ps, $user, $dateEntiere, $veto);
      return $construitPdf->Output($ps->nom.'.pdf', 'S');
  }

  public function modifEmailUser($user, $bsa, $ps)
  {
    return view('visites.modifEmail', [
      "user_id" => $user->id,
      "bsa_id" => $bsa->id,
      "ps_id" => $ps->id
    ]);
  }

  public function storeEmailUser(Request $request)
  {
    // Met à jour la base de donnée pour le mai de cet utilisateur
    $troupeau = Troupeau::find($request->all()['troupeau']);
    $bsa = Bsa::find($request->all()['bsa']);
    $ps = Ps::find($request->all()['ps']);
    $user = $troupeau->user;
    $user->email = $request->all()['email'];
    $user->save();
    // Envoie un mail à antikor pour dire de faire la modif dans le logiciel fevec
    $titre = "Modification ou ajout d'une adresse email";
    $message = "Attention, il faut mettre à jour l'adresse email de ".$user->name." avec l'adresse suivante: ".$request->all()['email'];
    Mail::to('antikor@orange.fr')->queue(
      new MailToAntikor($troupeau->id, $titre, $message)
    );

    $this->envoie($troupeau, $bsa, $ps);

    return redirect()->back();
  }
}
