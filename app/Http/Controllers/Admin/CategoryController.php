<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //category list
    public function categoryList(){
        $category = Category::get()->toArray();
        return view('category.category_list',compact('category'));
    }
    //add category
    // public function AddCategory(){
    //     return view('category.AddCategory');
    // }

    //CategoryEdit
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('category.AddCategory',compact('category'));
    }

    //store category
    public function storeCategory(Request $request,$id){

        // $request->validate([
        //     'category_name' => 'min:2|unique:categories,category_name',
        // ]);

        //image insert
        if(!empty($request['category_image'])){
        $image = $request->file('category_image');
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'category/images/category_image/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        }else{
            $imageUrl="";
        }




        $category = Category::findOrFail($id);



        $category->category_name = ucwords($request['category_name']);
        if(isset($imageUrl)){
            // unlink($category->category_image);
            $category->category_image = $imageUrl;
        }
        $category->status = 1;
        $category->save();

        return redirect()->back()->with('message','Category Created Successfully');

    }

    //category status
    public function categoryStatus(Request $request){



            $data = $request->all();

            if($data['status'] == "Active"){
               $status = 0;
            }else{
               $status =1;
            }

            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);

    }







    //Sub Category


    //category list
    public function SubCategoryList(){
        $subcategory = Subcategory::with('Category')->get()->toArray();
        // return $subcategory;
        return view('category.subcategory_details',compact('subcategory'));
    }
    //add category
    public function AddSubCategory(){
        $category = Category::latest()->get()->toArray();
        return view('category.AddSubCategory',compact('category'));
    }

    //store category
    public function storeSubCategory(Request $request){
        // return $request->all();

        $request->validate([
            'sub_category_name' => 'required|min:2|unique:subcategories,sub_category_name',
        ]);

        if(!empty($request['sub_category_image'])){
        //image insert
        $image = $request->file('sub_category_image');
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'category/images/sub_category_image/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        }else{
            $imageUrl="";
        }




        $category = new Subcategory;
        $category->sub_category_name = ucwords($request['sub_category_name']);
        $category->category_id = $request['category_id'];
        if(isset($imageUrl)){
            $category->sub_category_image = $imageUrl;
        }
        $category->status = 1;
        $category->save();

        return redirect()->back()->with('message',"Sub Category Created Successfully");

    }

    //category status
    public function SubCategoryStatus(Request $request){



            $data = $request->all();

            if($data['status'] == "Active"){
               $status = 0;
            }else{
               $status =1;
            }

            Subcategory::where('id',$data['subcategory_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subcategory_id'=>$data['subcategory_id']]);

    }


    //SubCategoryEdit
    public function SubCategoryEdit($id){
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::latest()->get()->toArray();
        return view('category.EditSubCategory',compact('subcategory','category'));
    }

    //storeSubCategory
    public function UpdateSubCategory(Request $request,$id){

        if(isset($request['sub_category_image'])){
        //image insert
            $image = $request->file('sub_category_image');
            $imageName = uniqid().'.'.$image->extension();
            $directory = 'category/images/sub_category_image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }

        $category = Subcategory::findOrFail($id);

        unlink($category->sub_category_image);

        $category->sub_category_name = ucwords($request['sub_category_name']);
        $category->category_id = $request['category_id'];
        if(isset($imageUrl)){
            $category->sub_category_image = $imageUrl;
        }
        $category->status = 1;
        $category->save();

        return redirect()->back()->with('message',"Sub Category Updated Successfully");
    }



}
