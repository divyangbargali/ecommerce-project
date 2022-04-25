<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    
    public function CategoryPage($id){

        $products = DB::table('categories')->join('products','categories.id','products.category_id')->select('categories.*','products.*')->where('categories.id',$id)->paginate(10);

        $category_name = DB::table('categories')->join('products','categories.id','products.category_id')->select('categories.*','products.*')->where('categories.id',$id)->first();

        return view('home.category',compact('products','category_name'));
    }
}
