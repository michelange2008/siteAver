<?php

namespace App\Http\Controllers\Aver\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StatRepository;
use App\Outils\MajDateMajFevec;

class AdminAverController extends Controller
{
    use MajDateMajFevec;
    
    public function index()
    {
        $stats = StatRepository::calculStatEleveursTroupeaux();
        return view('aver.admin.admin', [
            'stats' => $stats,
            'dernMaJ' => MajDateMajFevec::dernMaJEnMois(),
        ]);
        
    }
}
