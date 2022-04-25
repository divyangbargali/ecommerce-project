<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DiscountController extends Controller
{
    //

    public function DiscountCode(){
        $coupon =  DB::table('coupon_discount')->get();

        return view('admin.Discount.discount',compact('coupon'));
    }

    public function InsertDiscount(Request $req){

        $validateData = $req->validate([
            'coupon_code' => 'required|unique:coupon_discount|max:255',

            'coupon_percentage' => 'required|unique:coupon_discount|max:255',
        ],
    );

            $data = array();
            $data['coupon_code'] =  $req->coupon_code;
            $data['coupon_percentage'] = $req->coupon_percentage;

            DB::table('coupon_discount')->insert($data);

            return Redirect()->back()->with('success','Coupon Inserted Successfully');

    }
    
    public function EditDiscount($id){

            $coupon =  DB::table('coupon_discount')->where('id',$id)->first();

            return view('admin.Discount.edit_discount',compact('coupon'));

    }

    public function UpdateDiscount(Request $req,$id){

        $validateData = $req->validate([
            'coupon_code' => 'required|max:255',

            'coupon_percentage' => 'required|max:255',
        ],
    );

            $data = array();
            $data['coupon_code'] = $req->coupon_code;
            $data['coupon_percentage'] = $req->coupon_percentage;

            DB::table('coupon_discount')->where('id',$id)->update($data);

            return Redirect()->to('/discount/code/')->with('success','Coupon Updated Successfully');
    }


    public function DeleteDiscount($id){
            
        DB::table('coupon_discount')->where('id',$id)->delete();

        return Redirect()->back()->with('success','Coupon Deleted Successfully');

    }

    public function ApplyDiscount(Request $req){

        $validateData = $req->validate([
            'coupon_code' => 'required|max:255',
        ]);

        $coupon_code = $req->coupon_code;
        $coupon = DB::table('coupon_discount')->where('coupon_code',$coupon_code)->first();

        if($coupon){
            $coupon_percentage = $coupon->coupon_percentage;

            Session()->put('coupon_code',$coupon_code);
            Session()->put('coupon_percentage',$coupon_percentage);

            return redirect()->back()->with('success','coupon code apply Successfully');
        }else{
            return Redirect()->back()->with('failed','coupon code is invalid');
        }  
}

    public function RemoveCoupon(){
            Session()->forget('coupon_code');
            Session()->forget('coupon_percentage');

            return redirect()->back()->with('success','coupon code Remove Successfully');
    }


}
