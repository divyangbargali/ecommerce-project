<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest')->except('logout');
}

    public function Login(){
        return view('home.login');
    }
    
    
}
