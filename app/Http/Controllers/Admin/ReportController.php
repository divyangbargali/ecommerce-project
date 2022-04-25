<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function TodayOrder()
    {
        $date = date('Y/m/d');     
        $today_order = DB::table('orders')->where('date',$date)->where('status',0)->get();
        
        return view('admin.report.today_order',compact('today_order'));
    }

    public function TodayDeliver()
    {
        $date = date('Y/m/d');     
        $today_delivery = DB::table('orders')->where('date',$date)->where('status',3)->get();
        
        return view('admin.report.today_deliver',compact('today_delivery'));
    }

    public function ThisMonth(){

        $month = date('m');
        $this_month = DB::table('orders')->where('status',3)->where('month',$month)->paginate(5);

        return view('admin.report.this_month',compact('this_month'));
    }

    public function SearchReport(){
        return view('admin.report.search_report');
    }

    public function TodayOrderDetails($id){

        $today_order_details = DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','order_details.product_id','products.id')->select('orders.*','order_details.*','products.*')->where('orders.id',$id)->first();

        $today_shipping_details = DB::table('orders')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','shipping_details.*')->where('orders.id',$id)->first();

        return view('admin.report.today_order_details',compact('today_order_details','today_shipping_details'));
    }

    public function TodayDeliveryDetails($id){

        $today_delivery_details = DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','order_details.product_id','products.id')->select('orders.*','order_details.*','products.*')->where('orders.id',$id)->get();

        // dd($today_delivery_details);

        $today_delivery_shipping_details = DB::table('orders')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','shipping_details.*')->where('orders.id',$id)->first();
        
        return view('admin.report.today_delivery_details',compact('today_delivery_details','today_delivery_shipping_details'));
    }

    public function MonthlyOrderDetails($id){

        $monthly_delivery_details = DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','order_details.product_id','products.id')->select('orders.*','order_details.*','products.*')->where('orders.id',$id)->get();

        $monthly_delivery_shipping_details = DB::table('orders')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','shipping_details.*')->where('orders.id',$id)->first();
        
        return view('admin.report.monthly_delivery_details',compact('monthly_delivery_details','monthly_delivery_shipping_details'));

    }

    public function SearchByDate(Request $req){
        $date = $req->date;
        $newdate = date('Y/m/d',strtotime($date));

        $orders =  DB::table('orders')->where('date',$newdate)->where('status',3)->get();
        // dd($newdate);
       // dd($orders);
        return view('admin.report.search_by_date',compact('orders'));
    }

    public function ShowOrdersByDate($id){

        $today_delivery_details = DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','order_details.product_id','products.id')->select('orders.*','order_details.*','products.*')->where('orders.id',$id)->get();

        $today_delivery_shipping_details = DB::table('orders')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','shipping_details.*')->where('orders.id',$id)->first();

        return view('admin.report.show_order_by_date',compact('today_delivery_details','today_delivery_shipping_details'));
    }

    public function SearchByMonth(Request $req){

        $month = $req->month;
        $MonthlyOrders =  DB::table('orders')->where('month',$month)->get();

        return view('admin.report.search_by_month_details',compact('MonthlyOrders'));
    }

    public function ShowOrdersByMonth($id){

        $today_delivery_details = DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','order_details.product_id','products.id')->select('orders.*','order_details.*','products.*')->where('orders.id',$id)->get();

        $today_delivery_shipping_details = DB::table('orders')->join('shipping_details','orders.id','shipping_details.order_id')->select('orders.*','shipping_details.*')->where('orders.id',$id)->first();

        return view('admin.report.show_order_by_month',compact('today_delivery_details','today_delivery_shipping_details'));

    }
}
