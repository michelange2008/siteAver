<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Aver\Admin\AdminAverController;
use App\Http\Controllers\Aver\User\UserAverController;

class AverController extends Controller
{
    protected $adminAverController;
    protected $userAverController;
    
    public function __construct(AdminAverController $adminAverController, UserAverController $userAverController)
    {
        $this->middleware('auth');
        $this->adminAverController = $adminAverController;
        $this->userAverController = $userAverController;        
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->admin == 1)
            return $this->adminAverController->index();
        else
            return $this->userAverController->index();
    }
}
