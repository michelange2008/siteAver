<?php

namespace App\Http\Controllers\Parasitisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParasitismeController extends Controller
{

    public function index()
    {
      return view('parasitisme/parasitisme');
    }

    public function fiches()
    {
      return view('parasitisme/fiches');
    }

    public function formations()
    {
      return view('parasitisme/formations');
    }
}
