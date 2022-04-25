<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnOrderController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth:admin');
    }

    public function ReturnRequest(){

        $return_request = DB::table('order_details')->where('return_order',1)->paginate(7);

        return view('admin.return_order.return_request',compact('return_request'));
    }

    public function ViewReturnOrder(Request $req){

            $order_id   = $req->order_id;
            $product_id = $req->product_id;

            $data =  DB::table('orders')->join('order_details','orders.id','order_details.order_id')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','order_details.*','shipping_details.*')->where('order_details.order_id',$order_id)->where('order_details.product_id',$product_id)->first();

            return view('admin.return_order.view_return_order',compact('data'));
    }

    public function AcceptReturnOrder(Request $req){

  
             $order_id       =   $req->order_id;
             $product_id     =   $req->product_id;

             $data = array();
             $data['return_order'] = 2;

             DB::table('order_details')->where('order_id',$order_id)->where('product_id',$product_id)->update($data);

            return Redirect()->to('return/request')->with('success','Order Accepted For Return');
    }

    public function AllRequest(){

        $all_request = DB::table('order_details')->where('return_order',2)->paginate(7);        
        return view('admin.return_order.all_return_request',compact('all_request'));
    }
}
