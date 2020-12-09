<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProphyloController extends Controller
{

    public function index()
    {
      return view('prophylo');
    }
}
