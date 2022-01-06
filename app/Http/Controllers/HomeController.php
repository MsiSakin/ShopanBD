<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopImage;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $category_id = Subcategory::findOrFail($id);
        $sliders = Slider::where('status',1)->where('category_id',$category_id['category_id'])->get()->toArray();
        $sub_cat_products = Product::with('shop')->where('sub_category_id',$id)->where('status',1)->get()->toArray();
        // return $sub_cat_products;
        return view('Frontend.category.subcategory_page',compact('sub_cat_products','sliders'));
    }

    //Shop
    public function Shop(){
        $shops = Shop::with('shop')->latest()->get()->toArray();
        // return $shops;
        return view('Frontend.shop.shop_page',compact('shops'));
    }

    //ShopProduct
    public function ShopProduct($shop_id){
        $shop_products = Product::with('shop')->where('shop_id',$shop_id)->where('status',1)->paginate(15);
        $shop_slider = ShopImage::where('shop_id',$shop_id)->get()->toArray();
        // return $shop_slider;
        // return $shop_products;
        return view('Frontend.shop.shop_product',compact('shop_products','shop_slider'));
    }

    //productDetails
    public function productDetails($product_id){
        // return $product_id; die;
        $product_details = Product::with('shop')->findOrFail($product_id);
        // return $products;
        $related_products = Product::where('category_id',$product_details['category_id'])->get();
        return view("Frontend.product.product_details",compact('product_details','related_products'));
    }


    //add to cart
    public function Cart($id){

       if(Auth::check()){

       }else{
            //session id generate
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            $check = Cart::where('product_id',$id)->where('session_id',Session::get('session_id'))->first();
            if($check){
                Cart::where('product_id',$id)->where('session_id',Session::get('session_id'))->increment('quantity');
                return redirect()->back();
            }else{
                $product = Product::findOrFail($id);
                $cart_add = new Cart;
                $cart_add->customer_id = 0;
                $cart_add->session_id = $session_id;
                $cart_add->product_id = $id;
                $cart_add->shop_id = $product['shop_id'];
                $cart_add->quantity = 1;
                $cart_add->price = $product['price'];
                $cart_add->save();
                return redirect()->back()->with('message',"Add to cart successfully!");
            }
       }
    }

    //cart details
    public function CartDetails(){
        if(Auth::check()){

        }else{
            $session_id = Session::get('session_id');
            $cart_details = Cart::with('product','shop')->where('session_id',$session_id)->get()->toArray();

            // return $cart_details;
            return view('Frontend.cart.cart_details',compact('cart_details'));
        }
    }

    //QuantityUpdate
    public function QuantityUpdate(Request $request){
        $quantity = $request['quantity'];
        $product_id = $request['product_id'];

        $cart = Cart::where('product_id',$product_id)->first();
        $cart->quantity = $quantity;
        $cart->save();
        $sub_total = $cart['price']*$quantity;
        return $sub_total;



    }
}
