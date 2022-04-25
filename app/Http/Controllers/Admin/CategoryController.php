<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CategoryController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function category(){

        $category = DB::table('categories')->paginate(5);

        return view('admin.category.category',compact('category'));
    }

    public function InsertCategory(Request $req){

            $validateData = $req->validate([
                'category_name' => 'required|unique:categories|max:40',
            ]);

            $data = array();
            $data['category_name'] = $req->category_name;
            DB::table('categories')->insert($data);

            return Redirect()->back()->with('success','Category Inserted Successfully');
    }

    public function EditCategory($id){

             $category = DB::table('categories')->where('id',$id)->get();

             return view('admin.category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $req,$id){

                $validateData = $req->validate([
                    'category_name' => 'required|unique:categories|max:40',
                ]);

                $data = array();
                $data['category_name'] = $req->category_name;

                DB::table('categories')->where('id',$id)->update($data);

                return Redirect()->to('/category')->with('success','Category Updated Successfully');
    }

    public function CategoryDelete($id){
            DB::table('categories')->where('id',$id)->delete();

            return Redirect()->to('/category')->with('success','Category Deleted Successfully');
    }
}


