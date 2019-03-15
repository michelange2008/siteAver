<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\EnvoiPs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Factories\PdfFactory\PsConstruitPdf;
use App\Models\Ps;
use App\Models\Veto;
use App\Models\User;
use App\Models\Bsa;
use Carbon\Carbon;
use App\Traits\VerifieAdresseMail;

class EnvoiPsController extends Controller
{
  use VerifieAdresseMail;

  public function envoiPs($user_id, $bsa_id, $ps_id)
  {
    $user = User::find($user_id);
    $bsa = Bsa::find($bsa_id);
    $ps = Ps::find($ps_id);
    // tester si adresse mail valide
    if(!$this->verif($user->email) || $this->nomail($user->email))
    {
      // Demander une adresse mail
      return redirect(route('envoiPs.modifEmail', ["user" => $user])) ;
    } else {

      Mail::to('michelange@wanadoo.fr')->send(
        new EnvoiPs(Auth::user(),
        $this->affichePsUnEleveur($user, $bsa, $ps),
        $ps->nom)
      );

      return "mail envoyé";
    }
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

  public function modifEmailUser($user_id)
  {
    $user = User::where('id', $user_id)->first();
    return view('visites.modifEmail', [
      "user" => $user,
    ]);
  }
}
