<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //category list
    public function categoryList(){
        $category = Category::where('status',1)->get()->toArray();
        return view('category.category_list',compact('category'));
    }
    //add category
    public function AddCategory(){
        return view('category.AddCategory');
    }

    //store category
    public function storeCategory(Request $request){

        $request->validate([
            'category_name' => 'required|min:2|unique:categories,category_name',
        ]);

        if(!empty($request['category_image'])){
        //image insert
        $image = $request->file('category_image');
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'category/images/category_image/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        }else{
            $imageUrl="";
        }

       

        
        $category = new Category;
        $category->category_name = ucwords($request['category_name']);
        if(isset($imageUrl)){
            $category->category_image = $imageUrl;
        }
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('message','Category Created Successfully'); 
        
    }
}
