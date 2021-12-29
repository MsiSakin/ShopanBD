<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
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

    //slider api
    public function Slider(){
        $slider = Slider::where('status',1)->select('id','category_id','slider')->get()->toArray();
        if (!empty($slider)){
            return response()->json([
                'data'=>$slider,
            ],200);

        }else{
            return response()->json([
                'status'=>false,
            ],204);
        }
    }



















}
