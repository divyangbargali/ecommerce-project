<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;

class ProductController extends Controller
{


public function ShowProduct($id){
        
        $product = DB::table('products')->where('id',$id)->first();
        return view('home.product.show_product',compact('product'));
}

public function DownloadNow(){
        return view('download');
}

public function InsertCart(Request $req,$id){

         $product = DB::table('products')->where('id',$id)->first();
         $data = array();
         
         if($product->discount_price == NULL){
             $data['id']                =        $product->id;
             $data['name']              =        $product->product_name;
             $data['qty']               =        $req->product_quantity;
             $data['price']             =        $product->actual_price;
             $data['weight']            =        1;
             $data['options']['image']  =        $product->image_one;
             $data['options']['color']  =        $req->product_color;
             $data['options']['size']   =        $req->product_size;           

             Cart::add($data);
             return Redirect()->back()->with('success','Product Added to Cart');

         }
         else {
            $data['id']                 =       $product->id;
            $data['name']               =       $product->product_name;
            $data['qty']                =       $req->product_quantity;
            $data['price']              =       $product->discount_price;
            $data['weight']             =       1;
            $data['options']['image']   =       $product->image_one;
            $data['options']['color']   =       $req->product_color;
            $data['options']['size']    =       $req->product_size;

            Cart::add($data);
            return Redirect()->back()->with('success','Product Added to Cart');
         }


}

public function WishlistInsertCart(Request $req,$id){
       
        $wishitem =  DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$id)->first();

        if($wishitem){

        DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$id)->delete();

       }

        $product = DB::table('products')->where('id',$id)->first();
        $data = array();
        
        if($product->discount_price == NULL){
            $data['id']                =        $product->id;
            $data['name']              =        $product->product_name;
            $data['qty']               =        $req->product_quantity;
            $data['price']             =        $product->actual_price;
            $data['weight']            =        1;
            $data['options']['image']  =        $product->image_one;
            $data['options']['color']  =        $req->product_color;
            $data['options']['size']   =        $req->product_size;           

            Cart::add($data);
            return Redirect()->back()->with('success','Product Added to Cart');

        }
        else {
           $data['id']                 =       $product->id;
           $data['name']               =       $product->product_name;
           $data['qty']                =       $req->product_quantity;
           $data['price']              =       $product->discount_price;
           $data['weight']             =       1;
           $data['options']['image']   =       $product->image_one;
           $data['options']['color']   =       $req->product_color;
           $data['options']['size']    =       $req->product_size;

           Cart::add($data);
           return Redirect()->back()->with('success','Product Added to Cart');
        }


}

public function CartContent(){
            $cart = Cart::content();
           
            return view('home.product.show_cart',compact('cart'));

}

public function UpdateCart(Request $req){
            $id = $req->id;
            $qty = $req->qty;
            Cart::update($id,$qty);
            return Redirect()->back()->with('success','Cart quantity updated successfully');
}

public function DeleteCartItem($id){
            Cart::remove($id);
            return Redirect()->back()->with('success','Cart item remove successfully');
}

public function RemoveCartItem(){
            Cart::destroy();
            return Redirect()->back()->with('success','Cart remove successfully');
}






}
