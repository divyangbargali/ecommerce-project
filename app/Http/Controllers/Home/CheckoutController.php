<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;

class CheckoutController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:sanctum,web');
    }

    public function Checkout(){
        $cart = Cart::content();
       //dd($cart);
        return view('home.checkout',compact('cart'));
    }
    
    
}
