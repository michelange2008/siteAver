<?php

namespace App\Http\Controllers\Aver\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EssaiController extends Controller
{
    public function index()
    {

      return view('essai');
    }

    public function ajax(Request $request)
    {
      $retour = json_encode(["nom" => "toto"]);


      return $retour;
    }
}
