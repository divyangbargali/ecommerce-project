<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;

class PaymentController extends Controller
{
    public function submit(Request $request){

        $content = Cart::content();

        $id = Auth::user()->id;

        $paying_amount1 = Cart::subtotal() - (Cart::subtotal()*Session()->get('coupon_percentage'))/100;

        $shipping = DB::table('shipping_price')->first();

        $shipping_price = $shipping->shipping_price;

        $paying_amount2 = $paying_amount1 + $shipping_price;

        $subtotal = Cart::subtotal();

         $data = array();
         $data['user_id']           =   Auth::user()->id;
         $data['paying_amount']     =   $paying_amount2;
         $data['shipping']          =   $shipping_price;
         $data['status']            =   '0';
         $data['month']             =   date('m');
         $data['date']              =   date('Y/m/d');
         $data['year']              =   date('Y');
         $data['status_code']       =   mt_rand(100000,999999);

         $order_id = DB::table('orders')->insertGetId($data);

         $data = array();
         $data['order_id']          =   $order_id;
         $data['ship_name']         =   $request->ship_name;
         $data['ship_email']        =   $request->ship_email;
         $data['ship_address']      =   $request->ship_address;
         $data['ship_city']         =   $request->ship_city ;
           
         DB::table('shipping_details')->insert($data);

        foreach($content as $row){

        $data = array();
        $data['order_id']           =   $order_id;
        $data['product_id']         =   $row->id;
        $data['product_name']       =   $row->name;
        $data['color']              =   $row->options->color;
        $data['size']               =   $row->options->size;

        $data['quantity']           =   $row->qty;
        
        $data['single_price']       =   $row->price;
        $data['total_price']        =   $row->qty*$row->price;

        DB::table('order_details')->insert($data);

            session()->put('name',$request->ship_name);
            session()->put('email',$request->ship_email);
            session()->put('product_name',$row->name);
            session()->put('price',$paying_amount2);
            session()->put('product_id',$row->id);
            session()->put('qty',$row->qty);

        }
    
        if(Session::has('coupon_percentage')){
            Session::forget('coupon_percentage');
        }

        if(Session::has('coupon_code')){
            Session::forget('coupon_code');
        }

        Cart::destroy();

        $price           =     session()->get('price');
        $product_name    =     session()->get('product_name');
        $name            =     session()->get('name');
        $email           =     session()->get('email');

        // dd($price);
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:d9713ec0bd93ff0c8a19368cd8ddd565",
                        "X-Auth-Token:87981df93cf7042bef2e79cc38b85fe2"));
        $payload = Array(
            'purpose' => $product_name,
            'amount' => $price,
            'phone' => '7302640742',
            'buyer_name' => $name,
            'redirect_url' => 'http://localhost/laravelmauth/multiau/instamojo_redirect/',
            'send_email' => true,
            'send_sms' => true,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        
        $response = json_decode($response);

        // echo '<pre>';
        // print_r($response->payment_request->longurl);

        return redirect($response->payment_request->longurl);
}

    public function instamojo_redirect(){
        

            if($_GET['payment_status'] == 'Credit'){

            $qty = session()->get('qty');
            $product_id = session()->get('product_id');

            $product_quantity = DB::table('products')->where('id',$product_id)->first();

            $actual_product_quantity = $product_quantity->product_quantity;

            $quantity_after_purchase = $actual_product_quantity-$qty;

            $data = array();
            $data['product_quantity'] = $quantity_after_purchase;

            DB::table('products')->where('id',$product_id)->update($data);

            session()->forget('product_name');
            session()->forget('name');
            session()->forget('email');
            session()->forget('price');
            session()->forget('qty');
            session()->forget('product_id');
            
            return Redirect()->to('/')->with('success','Payment Successful');

            }else{
            
            return Redirect()->to('/')->with('success','Payment Cancel');
            }



           

    }

}
