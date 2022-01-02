<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home
    public function HomePage(){
        $category = Category::latest()->get()->toArray();
        $products = Product::with('shop')->latest()->get()->toArray();
        return view('Frontend.index',compact('category','products'));
    }

    //CategoryShow
    public function CategoryShow($id){
        $sub_category = Subcategory::where('category_id',$id)->get()->toArray();
        $sliders = Slider::where('status',1)->where('category_id',$id)->get()->toArray();
        $products = Product::with('shop')->where('category_id',$id)->where('status',1)->get()->toArray();
        // return $products;
        return view('Frontend.category.category_page',compact('sub_category','sliders','products'));

    }

    //SubcategoryShow
    public function SubcategoryShow($id){
        $sub_cat_products = Product::with('shop')->where('sub_category_id',$id)->where('status',1)->get()->toArray();
        // return $sub_cat_products;
        return view('Frontend.category.subcategory_page',compact('sub_cat_products'));
    }

    //Shop
    public function Shop(){
        $shops = Shop::with('shop')->latest()->get()->toArray();
        // return $shop;
        return view('Frontend.shop.shop_page',compact('shops'));
    }
}
