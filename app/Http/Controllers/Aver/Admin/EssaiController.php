<?php

namespace App\Http\Controllers\Aver\Admin;

use App\Http\Controllers\Controller;
use App\Models\Essai;
use Illuminate\Http\Request;

class EssaiController extends Controller
{
    use \App\Traits\SortTroupeaux;
    
    public function index()
    {

      return view('essai', [
          'liste' => $this->sortTroupeaux(),
      ]);
    }

    public function ajax(Request $request)
    {

        $datas = $request->all();

        if($datas['cb'] == true)
        {
            $cb = 1;
        }
        else {
            $cb = 0;
        }

        $essai = new Essai();
        $essai->user_id = $datas['nom'];
        $essai->coche = $cb;
        $essai->save();
        $msg = "C'est bon c'est enregistré";
      return response()->json(['cb' => $datas['cb']]);
    }
}
