<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BrandController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function Brand(){
            $brands = DB::table('brands')->paginate(3);
            return view('admin.category.brand',compact('brands'));
    }

    public function InsertBrand(Request $req){
            $validateData = $req->validate([
                'brand_name' => 'required|unique:brands',
                'brand_logo' => 'required|mimes:jpg,jpeg,png',
            ]);

            $brand_logo = $req->file('brand_logo');

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_logo->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'public/image/brand/';
            $last_img = $up_location.$img_name;
            $brand_logo->move($up_location,$img_name);


            $data = array();
            $data['brand_name'] = $req->brand_name;
            $data['brand_logo'] = $last_img;

            DB::table('brands')->insert($data);

            return Redirect()->to('/brand')->with('success','Brand Inserted Successfully');
    }

    public function EditBrand($id){
            $brands = DB::table('brands')->where('id',$id)->first();
            return view('admin.category.edit_brand',compact('brands'));
    }

    public function BrandUpdate(Request $req,$id){
        $validateData = $req->validate([
            'brand_name' => 'required',
            'brand_logo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $old_image = $req->old_logo;

        $brand_logo = $req->file('brand_logo');
            
        if($brand_logo){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_logo->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'public/image/brand/';
            $last_img = $up_location.$img_name;
            $brand_logo->move($up_location,$img_name);  

            unlink($old_image);

            $data = array();
            $data['brand_name'] = $req->brand_name;
            $data['brand_logo'] = $last_img;

            DB::table('brands')->where('id',$id)->update($data);

            return Redirect()->to('/brand')->with('success','Brand Updated Successfully');

        }else{
            $data = array();
            $data['brand_name'] = $req->brand_name;

            DB::table('brands')->where('id',$id)->update($data);

            return Redirect()->to('/brand')->with('success','Brand Updated Successfully');
        }
    }
}
