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


class EnvoiPsController extends Controller
{

  public function envoiPs($user_id, $bsa_id, $ps_id)
  {
    $ps = Ps::find($ps_id);

    Mail::to('michelange@wanadoo.fr')->send(new EnvoiPs(Auth::user(), $this->affichePsUnEleveur($user_id, $bsa_id, $ps_id), $ps->nom.".pdf"));

    return "mail envoyé";
  }
  /*
  // crée un pdf avec le ps d'un éleveur donné pour un bsa donné
  */
  public function affichePsUnEleveur($user_id, $bsa_id, $ps_id)
  {
      $ps = Ps::find($ps_id);
      $bsa = Bsa::find($bsa_id);
      $date = $bsa->date_bsa;
      $dateTab = explode("-", $date);
      $dateEntiere = Carbon::createFromDate($dateTab[0], $dateTab[1], $dateTab[2]);
      $veto = Veto::where('id', $bsa->veto_id)->first();
      $user = User::find($user_id);
      $construitPdf = new PsConstruitPdf();
      $construitPdf->Header();
      $construitPdf->creeFichierPdf($ps, $user, $dateEntiere, $veto);
      return $construitPdf->Output($ps->nom.'.pdf', 'S');
  }
}
