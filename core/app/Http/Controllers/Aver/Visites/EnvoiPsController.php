<?php

namespace App\Http\Controllers\Aver\Visites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\EnvoiPs;
use Illuminate\Support\Facades\Auth;

class EnvoiPsController extends Controller
{
  public function index()
  {
    Mail::to('michelange@wanadoo.fr')->queue(new EnvoiPs(Auth::user()));

    return "mail envoyé";
  }
}
