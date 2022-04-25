<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;

class AdminDashboardController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth:admin');
        }

    public function AdminDashboard(){
        return view('admin.admin');
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }

    public function dashboard(){
        return view('admin.admin');
    }
}
