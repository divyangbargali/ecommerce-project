<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;
use Image;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function AddProduct(){

        return view('admin.product.add_product');
    }

    public function InsertProduct(Request $req){

            $validateData = $req->validate([
                'product_name'      =>    'required',
                'product_code'      =>    'required|unique:products|max:45',
                'actual_price'      =>    'required|max:45',
                'discount_price'    =>    'max:45',
                'category_id'       =>    'required|max:45',
                'product_size'      =>    'required|max:45',
                'product_color'     =>    'required|max:45',
                'product_quantity'  =>    'required|max:45',
                'product_details'   =>    'required|max:45555',
                'image_one'         =>    'required|mimes:jpg,jpeg,png',
                'image_two'         =>    'required|mimes:jpg,jpeg,png',
                'image_three'       =>    'required|mimes:jpg,jpeg,png',
            ]);

         
           $image_one   = $req->file('image_one');
           $image_two   = $req->file('image_two');
           $image_three   = $req->file('image_three');
           

        //    $name_gen = hexdec(uniqid());
        //    $img_ext = strtolower($image_one->getClientOriginalExtension());
        //    $img_name = $name_gen.'.'.$img_ext;
        //    $up_location = 'public/image/product/';
        //    $last_img = $up_location.$img_name;
        //    $image_one->move($up_location,$img_name);


           //generating a name for image with uniqid().
            $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();

            //Resizing and saving image.
            Image::make($image_one)->resize(300,200)->save('public/image/product/'.$name_gen);

            //Storing Image path and image name in a variable 
            $last_img = 'public/image/product/'.$name_gen;


        //    $name_gen2 = hexdec(uniqid());
        //    $img_ext2 = strtolower($image_two->getClientOriginalExtension());
        //    $img_name2 = $name_gen2.'.'.$img_ext2;
        //    $up_location2 = 'public/image/product';
        //    $last_img2 = $up_location.$img_name2;
        //    $image_two->move($up_location2,$img_name2);

            //generating a name for image with uniqid().
            $name_gen2 = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();

            //Resizing and saving image.
            Image::make($image_two)->resize(300,200)->save('public/image/product/'.$name_gen2);

            //Storing Image path and image name in a variable 
            $last_img2 = 'public/image/product/'.$name_gen2;

        //    $name_gen3 = hexdec(uniqid());
        //    $img_ext3 = strtolower($image_three->getClientOriginalExtension());
        //    $img_name3 = $name_gen3.'.'.$img_ext3;
        //    $up_location3 = 'public/image/product';
        //    $last_img3 = $up_location.$img_name3;
        //    $image_three->move($up_location3,$img_name3);

            //generating a name for image with uniqid().
            $name_gen3 = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();

            //Resizing and saving image.
            Image::make($image_three)->resize(300,200)->save('public/image/product/'.$name_gen3);

            //Storing Image path and image name in a variable 
            $last_img3 = 'public/image/product/'.$name_gen3;

           $data = array();
           $data['product_name']        =   $req->product_name;
           $data['product_code']        =   $req->product_code;
           $data['actual_price']        =   $req->actual_price;
           $data['discount_price']      =   $req->discount_price;
           $data['category_id']         =   $req->category_id;
           $data['subcategory_id']      =   $req->subcategory_id;
           $data['brand_id']            =   $req->brand_id;
           $data['product_size']        =   $req->product_size;
           $data['product_color']       =   $req->product_color;
           $data['product_quantity']    =   $req->product_quantity;
           $data['product_details']     =   $req->product_details;
           $data['image_one']           =   $last_img;
           $data['image_two']           =   $last_img2;
           $data['image_three']         =   $last_img3;
           $data['feature']             =   $req->feature;
        
            DB::table('products')->insert($data);
            return Redirect()->back()->with('success','Product Inserted Successfully');
    }


    public function AllProduct(){

         $products =  DB::table('products')->paginate(5);
         return view('admin.product.all_product',compact('products'));

    }

    public function GetSubcategory($id){

         $subcategory = DB::table('subcategories')->where('category_id',$id)->get();
         return json_encode($subcategory);

    }

    public function ViewProduct($id){

         $product = DB::table('products')->where('id',$id)->first();
         return view('admin.product.view_products',compact('product'));
    }

    public function EditProduct($id){

        $product = DB::table('products')->where('id',$id)->first();
        return view('admin.product.edit_product',compact('product'));
    }

    public function UpdateProduct(Request $req,$id){
            
        $validateData = $req->validate([
            'product_name'      =>    'required|max:45',
            'product_code'      =>    'required|max:45',
            'actual_price'      =>    'required|max:45',
            'discount_price'    =>    'max:45',
            'category_id'       =>    'required|max:45',
            'product_size'      =>    'required|max:45',
            'product_color'     =>    'required|max:45',
            'product_quantity'  =>    'required|max:45',
            'product_details'   =>    'required',
            'image_one'         =>    'mimes:jpg,jpeg,png',
            'image_two'         =>    'mimes:jpg,jpeg,png',
            'image_three'       =>    'mimes:jpg,jpeg,png',
        ]);

       $data = array();
       $data['product_name']        =   $req->product_name;
       $data['product_code']        =   $req->product_code;
       $data['actual_price']        =   $req->actual_price;
       $data['discount_price']      =   $req->discount_price;
       $data['category_id']         =   $req->category_id;
       $data['subcategory_id']      =   $req->subcategory_id;
       $data['brand_id']            =   $req->brand_id;
       $data['product_size']        =   $req->product_size;
       $data['product_color']       =   $req->product_color;
       $data['product_quantity']    =   $req->product_quantity;
       $data['product_details']     =   $req->product_details;
       $data['feature']             =   $req->feature;
    
        DB::table('products')->where('id',$id)->update($data);
        return Redirect()->back()->with('success','Product Updated Successfully');  

    }


    public function UpdateProductImage(Request $req,$id)
    {
        $validateData = $req->validate([
            'image_one'         =>    'mimes:jpg,jpeg,png',
            'image_two'         =>    'mimes:jpg,jpeg,png',
            'image_three'       =>    'mimes:jpg,jpeg,png',
        ]);

        $image_one   = $req->file('image_one');
        $image_two   = $req->file('image_two');
        $image_three   = $req->file('image_three');
        
     if($image_one)
     {
        //generating a name for image with uniqid().
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();

        //Resizing and saving image.
        Image::make($image_one)->resize(300,200)->save('public/image/product/'.$name_gen);

        //Storing Image path and image name in a variable 
        $last_img = 'public/image/product/'.$name_gen;


        $data = array();
        $data['image_one'] = $last_img;

        DB::table('products')->where('id',$id)->update($data);

     }
      if($image_two)
     {
        // $name_gen2 = hexdec(uniqid());
        // $img_ext2 = strtolower($image_two->getClientOriginalExtension());
        // $img_name2 = $name_gen2.'.'.$img_ext2;
        // $up_location2 = 'public/image/product/';
        // $last_img2 = $up_location2.$img_name2;
        // $image_two->move($up_location2,$img_name2);

        //generating a name for image with uniqid().
        $name_gen2 = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();

        //Resizing and saving image.
        Image::make($image_two)->resize(300,200)->save('public/image/product/'.$name_gen2);

        //Storing Image path and image name in a variable 
        $last_img2 = 'public/image/product/'.$name_gen2;


        $data = array();
        $data['image_two'] = $last_img2;

        DB::table('products')->where('id',$id)->update($data);
        
     }
     if($image_three)
     {
        // $name_gen3 = hexdec(uniqid());
        // $img_ext3 = strtolower($image_three->getClientOriginalExtension());
        // $img_name3 = $name_gen3.'.'.$img_ext3;
        // $up_location3 = 'public/image/product/';
        // $last_img3 = $up_location3.$img_name3;
        // $image_three->move($up_location3,$img_name3);

        //generating a name for image with uniqid().
        $name_gen3 = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();

        //Resizing and saving image.
        Image::make($image_three)->resize(300,200)->save('public/image/product/'.$name_gen3);

        //Storing Image path and image name in a variable 
        $last_img3 = 'public/image/product/'.$name_gen3;


        $data = array();
        $data['image_three'] = $last_img3;
        DB::table('products')->where('id',$id)->update($data);
       
     }
     
     return Redirect()->back()->with('success','Image Updated Successfully');

    }

    public function DeleteProduct($id){

            DB::table('products')->where('id',$id)->delete();
            return Redirect()->to('/all/product/')->with('success','Product Deleted Successfully');
    }

   
    public function ShippingPrice(){

        
        return view('admin.shipping_price.shipping_price');
    }

    public function AddShipPrice(Request $req){

            $shipping_price   =   $req->shipping_price;

            $data = array();
            $data['shipping_price'] = $shipping_price;
            DB::table('shipping_price')->insert($data);

            return redirect()->back()->with('success','Shipping Price is Added');
    }

    public function EditShipPrice(){

           $shipping_price =  DB::table('shipping_price')->first();

           return view('admin.shipping_price.edit_ship_price',compact('shipping_price'));
    }

    public function UpdateShipPrice(Request $req){

        $validateData = $req->validate([
            'shipping_price' => 'required|unique:shipping_price|max:255',
        ],

        [
            'shipping_price.required' => 'Please input Price',
        ]
    );

            $data = array();
            $data['shipping_price'] = $req->shipping_price;

            DB::table('shipping_price')->where('id',1)->update($data);

            return redirect()->back()->with('success','Shipping Price is Updated');

            
    }
    
}
