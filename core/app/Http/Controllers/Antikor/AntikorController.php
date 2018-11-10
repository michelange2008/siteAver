<?php

namespace App\Http\Controllers\Antikor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controller\AverController;

class AntikorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index()
  {
    if(Auth()->user()->admin === 1) {
      return view('antikor.accueil');
    }
    else {
      return redirect('aver');
    }

  }
}
