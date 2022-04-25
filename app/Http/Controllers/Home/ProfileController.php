<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProfileController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:sanctum,web');
    }


    public function Profile(){
        return view('home.profile');
    }

    public function ViewOrderStatus($id){

       $id = $id;
       $order =  DB::table('orders')->where('status_code',$id)->first();

       $order_id = $order->id;

       $order_details = DB::table('orders')->join('order_details','orders.id','order_details.order_id')->select('order_details.*')->where('orders.id',$order_id)->get();

      // dd($order_details);

        return view('home.view_order_status',compact('order','order_details'));
    }

    public function ReturnOrder(){

        $return_products = DB::table('orders')->join('order_details','orders.id','order_details.order_id')->select('order_details.*')->where('orders.status',3)->where('user_id',Auth::id())->get();

        return view('home.return_order',compact('return_products'));
    }

    public function OrderReturnRequest(Request $req){

        $product_id         =  $req->product_id;
        $order_details_id   =  $req->order_details_id;

        $data = array();
        $data['return_order'] = 1;

        DB::table('order_details')->where('product_id',$product_id)->where('id',$order_details_id)->update($data);

        return Redirect()->back()->with('success','Order Return has Requested');
    }
}
