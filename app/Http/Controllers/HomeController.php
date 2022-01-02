<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home
    public function HomePage(){
        $category = Category::latest()->get()->toArray();
        $products = Product::with('shop')->latest()->get()->toArray();
        return view('Frontend.index',compact('category','products'));
    }
}
