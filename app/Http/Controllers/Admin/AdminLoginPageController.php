<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class AdminLoginPageController extends Controller
{
    //

    public function __construct(){

        $this->middleware('admin:admin');
        }


    public function AdminLogin(){
        return view('admin.admin_login');
    }

}
