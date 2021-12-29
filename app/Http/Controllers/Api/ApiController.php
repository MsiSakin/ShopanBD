<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Shopkeeper;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    //Admin Login
    public function AdminLogin(Request $request){
        if(!Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            return response()->json([
                'status'=>false,
            ],204);
        }else{
            $admin = Admin::where('email',$request->email)->get();
            return response()->json([
                'data'=>$admin,
            ],200);
        }
        // return redirect()->intended(route('admin.home'));
      
    }

    //category api
    public function Category(){
        $category = Category::where('status',1)->select('id','category_name','category_image')->get()->toArray();
        if (!empty($category)){
            return response()->json([
                'data'=>$category,
            ],200);

        }else{
            return response()->json([
                'status'=>false,
            ],204);
        }
    }

    //sub category api
    public function SubCategory(){
        $subcategory = Subcategory::with('Category')->where('status',1)->select('id','category_id','sub_category_name','sub_category_image')->get()->toArray();
        if (!empty($subcategory)){
            return response()->json([
                'data'=>$subcategory,
            ],200);

        }else{
            return response()->json([
                'status'=>false,
            ],204);
        }
    }



}
