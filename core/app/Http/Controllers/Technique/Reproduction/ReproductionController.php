<?php

namespace App\Http\Controllers\Technique\Reproduction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReproductionController extends Controller
{
    public function animation()
    {
      return view('technique.reproduction.animation');
    }

}
