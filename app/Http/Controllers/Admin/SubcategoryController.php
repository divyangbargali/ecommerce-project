<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SubcategoryController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function SubCategory(){
        $subcategory = DB::table('subcategories')->paginate(5);

        return view('admin.category.subcategory',compact('subcategory'));
    }

    public function InsertSubcategory(Request $req){

            $validateData = $req->validate([
                'subcategory_name' => 'required|unique:subcategories|max:40',
                'category_id' => 'required',
            ]);
            
        $data = array();
        $data['subcategory_name'] = $req->subcategory_name;
        $data['category_id'] = $req->category_id;

        DB::table('subcategories')->insert($data);

        return Redirect()->back()->with('success','Subcategory Inserted Successfully');
    }

    public function SubcategoryEdit($id){

        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        return view('admin.category.subcategory_edit',compact('subcategory'));
    }

    public function SubcategoryUpdate(Request $req,$id){

         $validateData = $req->validate([
             'subcategory_name' => 'required|max:40',
             'category_id' => 'required',
         ]);

            $data = array();
            $data['category_id'] = $req->category_id;
            $data['subcategory_name'] = $req->subcategory_name;
            
            // return $req->input();

             DB::table('subcategories')->where('id',$id)->update($data);

             return Redirect()->to('/subcategory')->with('success','Subcategory Updated Successfully');
    }

    public function DeleteSubcategory($id){
            DB::table('subcategories')->where('id',$id)->delete();

            return Redirect()->to('/subcategory')->with('success','Subcategory Deleted Successfully');
    }
}
