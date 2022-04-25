<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct(){

    $this->middleware('auth:admin');
    }

    public function NewOrder(){

       $orders = DB::table('orders')->where('status',0)->paginate(5);
       return view('admin.order.neworder',compact('orders'));

    }

    public function ViewOrder($id){

          $order = DB::table('orders')->where('id',$id)->get();
          $order_details = DB::table('order_details')->where('order_id',$id)->get();
          $shipping_details = DB::table('shipping_details')->where('order_id',$id)->get();
       
          return view('admin.order.view_order',compact('order','shipping_details','order_details'));

    }

    public function AcceptOrder($id){
            
        $data = array();
        $data['status'] = 1;

        DB::table('orders')->where('id',$id)->update($data);
        return Redirect()->to('/new/order/')->with('success','Order Accepted Successfully');

    }
    
    public function CancelOrder($id){

        $data = array();
        $data['status'] = 4;

        DB::table('orders')->where('id',$id)->update($data);
        return Redirect()->to('/new/order/')->with('success','Order Cancel Successfully');
    }


    public function AcceptPayment(){

        $orders = DB::table('orders')->where('status',1)->paginate(5);
        return view('admin.order.accept_payment',compact('orders'));

    }

    public function ProcessDelivery($id){

        $data = array();
        $data['status'] = 2;

        DB::table('orders')->where('id',$id)->update($data);
        return Redirect()->to('/accept/payment')->with('success','Order is Delivered');

    }

    public function OrderCancel(){

       $orders = DB::table('orders')->where('status',4)->paginate(5);
       return view('admin.order.cancel_order',compact('orders'));

    }

    public function ProcessDelivered(){

        $orders = DB::table('orders')->where('status',2)->paginate(5);
       return view('admin.order.process_delivered',compact('orders'));

    }

    public function DeliveryDone($id){

        $data = array();
        $data['status'] = 3;

        DB::table('orders')->where('id',$id)->update($data);
        return Redirect()->to('process/delivery')->with('success','Delivery Done');
    }

    public function DeliverySuccess(){

        $orders = DB::table('orders')->where('status',3)->paginate(5);
        return view('admin.order.delivery_success',compact('orders'));

    }

   
}
