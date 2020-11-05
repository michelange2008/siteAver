<?php

namespace App\Http\Controllers\Technique;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LitJSON;

class TarissementController extends Controller
{
    use LitJSON;

    public function index()
    {
      $datas = $this->litJSON("tarissement");
      return view('technique/tarissement/tarissement', [
        "datas" => $datas
        ] );
    }
}
