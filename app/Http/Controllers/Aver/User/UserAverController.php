<?php

namespace App\Http\Controllers\Aver\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAverController extends Controller
{
    public function index()
    {
        return view('aver/aver');
    }
}
