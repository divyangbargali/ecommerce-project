<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class WishlistController extends Controller
{
    //

    public function Wishlist($id){

        if(Auth::check()){

           $wishlist =  DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$id)->first();

            if($wishlist){

                return redirect()->to('/')->with('success','Product is already Added on your Wishlist');
            }
            else{
                $data = array();
                $data['user_id'] = Auth::user()->id;
                $data['product_id'] = $id;
    
                DB::table('wishlist')->insert($data);

                return redirect()->to('/')->with('success','Product Added to Your Wishlist');
            }
        }else{

            return redirect()->to('/')->with('success','Login to Your Account For Adding Product to Wishlist');
        }

    }

    public function WishlistItem(){

        $wishlist = DB::table('wishlist')->join('products','wishlist.product_id','products.id')->select('products.*','wishlist.*')->get();

        

        return view('home.wishlist',compact('wishlist'));
    }
}
