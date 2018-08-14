<?php

namespace App\Http\Controllers\Aver\Admin;

use App\Http\Controllers\Controller;
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
        
        $datas = collect($request->all())->slice(1);

        if($datas->count() < 2 )
        {
            $datas['cb'] = 0;
        }
        else
        {
            $datas['cb'] = 1;
        }
      $temp = json_encode($request->all());
      
      return $temp;
    }
}
