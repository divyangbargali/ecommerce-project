<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home(){
        $products = DB::table('products')->get();
        return view('home.home',compact('products'));
    }

    public function userlogout(){
        Auth::logout();

        return redirect()->to('/');
    }
   
    public function register(){
        return view('poi.register');
    }
    
    public function AboutUs(){
        return view('home.about_us');
    }

    public function ContactUs(){
        return view('home.contact_us');
    }

    public function Search(Request $req){
        
        $search = $req->search;
        $products = DB::table('products')->where('product_name','LIKE',"%$search%")->get();
        
        return view('home.search_result',compact('products'));
    }

    public function first(){

        $first = DB::table('users')->first();

        return view('first',compact('first'));
    }
}
