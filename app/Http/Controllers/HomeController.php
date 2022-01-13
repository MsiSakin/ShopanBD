<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SetLocation;
use App\Models\Shop;
use App\Models\ShopDeviceToken;
use App\Models\ShopImage;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
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
        $category_id = $id;
        // return $products;
        return view('Frontend.category.category_page',compact('sub_category','sliders','products','category_id'));

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
    public function Shop($id){
        $shops = Shop::with('shop')->where('category_id',$id)->latest()->get()->toArray();
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
                // $cart_add->customer_id = 0;
                $cart_add->session_id = $session_id;
                $cart_add->product_id = $id;
                $cart_add->shop_id = $product['shop_id'];
                $cart_add->quantity = 1;
                $cart_add->price = $product['discounted_price'];
                $cart_add->sub_total = $product['discounted_price']*1;
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
            $cart_details = Cart::with('product','shop')->where('session_id',$session_id)->get();

            $total = $cart_details->sum('sub_total');
            // return $cart_details;
            return view('Frontend.cart.cart_details',compact('cart_details','total'));
        }
    }

    //QuantityUpdate
    public function QuantityUpdateMinus($cart_id){
        $cart = Cart::where('id',$cart_id)->first();
        if($cart['quantity'] <= 1){
            $cart->quantity = 1;
            $cart->sub_total = $cart['price']*$cart['quantity'];
            $cart->save();
        }else{
            $cart->decrement('quantity');
            $cart->sub_total = $cart['price']*$cart['quantity'];
            $cart->save();
        }

        return back();

    }

    //QuantityUpdatePlus
    public function QuantityUpdatePlus($cart_id){
        $cart = Cart::where('id',$cart_id)->first();
        $cart->increment('quantity');
        $cart->sub_total = $cart['price']*$cart['quantity'];
        $cart->save();
        return back();
    }

    //CouponApply
    public function CouponApply(Request $request){
        $coupon = $request['coupon_name'];

        $coupon_data = Coupon::where('coupon_name',$coupon)->count();
        if($coupon_data > 0){
            $coupon_details = Coupon::where('coupon_name',$coupon)->first();
            $validity_check = Carbon::now();
            if($coupon_details['validity'] < $validity_check){
                return redirect()->back()->with('error',"Coupon Already Expired");
            }else{
                Session::put('coupon_session',[
                    'coupon_name'=>$coupon_details['coupon_name'],
                    'coupon_discount'=>$coupon_details['discount']
                ]);

                return redirect()->back()->with('success',"Coupon Applied");
            }

        }else{
            return redirect()->back()->with('error',"Invalid Coupon Apply");
        }
    }


    //Checkout login check
    public function Checkout(){

        // if(Auth::check()){
            // return redirect('/checkout-form');
        // }
        $session_id = Session::get('session_id');
        if($session_id){
            $cart = Cart::where('session_id',$session_id)->first();
            if($cart){
                $id = $cart['customer_id'];
                if(!empty($id)){
                    return redirect('/checkout-form');
                }else{
                    return redirect('/login');
                }
            }else{
                return back()->with('error',"Session Expired");
            }
        }else{
            return back()->with('error',"Session Expired");
        }


    }

    //UserLogin
    public function UserLogin(Request $request){
        $request->validate([
            'phone' => 'required|min:11',
        ]);




        //phone exits or not
        $phone_exit_or_not = User::where('phone',$request['phone'])->count();
        if($phone_exit_or_not == 1){
            // return redirect('/checkout-form');
            $customer = User::where('phone',$request['phone'])->first();
            $code = rand(0, 999999);

            $customer->phone = $request['phone'];
            $customer->code = $code;
            $customer->save();

            //cart customer_id update

            $to = $request['phone'];
            $token = "5fe395aac73568229b46318e68515658";
            $message = "Hello Sir,  SopanBD OTP Is: ".$code;

            $url = "http://api.greenweb.com.bd/api.php?json";


            $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);

            $session_id = Session::get('session_id');
            if($session_id){
                $cart = Cart::where('session_id',$session_id)->first();
                if($cart){
                    $cart['customer_id'] = $customer['id'];
                    $cart->save();
                }
            }


            if(isset($smsresult)){
                return view('auth.code');
            }else{
                return back();
            }
        }else{
            $customer = new User;
            $code = rand(0, 999999);

            $customer->phone = $request['phone'];
            $customer->code = $code;
            $customer->save();

            //cart customer_id update

            $to = $request['phone'];
            $token = "5fe395aac73568229b46318e68515658";
            $message = "Hello Sir,  SopanBD OTP Is: ".$code;

            $url = "http://api.greenweb.com.bd/api.php?json";


            $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);

            $session_id = Session::get('session_id');
            if($session_id){
                $cart = Cart::where('session_id',$session_id)->first();
                if($cart){
                    $cart['customer_id'] = $customer['id'];
                    $cart->save();
                }
            }


            if(isset($smsresult)){
                return view('auth.code');
            }else{
                return back();
            }
        }
    }

    //UserCode
    public function UserCode(Request $request){
        if(!empty($request['code'])){
            $user = User::where('code',$request['code'])->count();
            if($user > 0){
                return redirect('/checkout-form');
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    //CheckOutForm
    public function CheckOutForm(){
        $session_id = Session::get('session_id');
        if($session_id){
            $cart = Cart::where('session_id',$session_id)->first();
            $id = $cart['customer_id'];
            $customer = User::where('id',$id)->first();
        }

        return view('Frontend.cart.checkout_form',compact('customer'));
    }

    //DeliveryChargeCal
    public function DeliveryChargeCal(Request $request){

        $Id = $request['Id'];
        $sub_area_charge = SetLocation::where('id',$Id)->select('delivery_charge')->first();
        $charge = $sub_area_charge['delivery_charge'];
        $carts = Cart::select('shop_id')->distinct()->get()->count();
        $val = ( $carts - 1 ) * 5;
        $delivery_charge =  (int)$charge + $val;

        $cart_sub_total = Cart::where('session_id',Session::get('session_id'))->sum('sub_total');

        if(Session::get('coupon_session')){
            $discount = $cart_sub_total * Session::get('coupon_session')['coupon_discount'] / 100;
            $updated_price = $cart_sub_total - $discount;
            $grand_total = $updated_price + $delivery_charge;
        }else{
            $updated_price = $cart_sub_total;
            $grand_total = $updated_price + $delivery_charge;
        }

        Session::put('grand_total',$grand_total);
        Session::put('delivery_charge',$delivery_charge);
        return response()->json([
            'grand_toal'=>$grand_total,
            'delivery_charge'=>$delivery_charge
        ],200);

    }

    public function NotifyDeliveryMan(){


        sleep(3);
            //push notification
        $Shop_carts = Cart::where('session_id',Session::get('session_id'))->select('shop_id')->distinct()->get()->toArray();

        $serverkey = 'AAAAAjKhGfQ:APA91bFiHMApm1ff6pUK3Iq1UhYAoMchL51QX8DEidR9IC_SbXxOlZXqmiyr-ishHIGq9bSQFAZLriCMpn_9dqwNb9pRWLIbjt1Pe8m4QPUOvDe5N6JOLymUjO9nkIqsMBB3VYZTPy_2';
         $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
         $token = 'cKMWd_i-424LH6uYler2Y6:APA91bHs0hhQCK763-Rh7DMpWLBGDtsNqPazI2W0gpyTIMKkalf7FvSNX7SehBTQmfcj6kXZ6luH0dmji4aI8-6EMAW6Wmt5EI7KOih6fS_OmBarZSCTOoqq-sZt6ri9oDnK88YC-sgl';
         $notification = [
            'title' => "New Order Request Found",
            'body' => "Please Check Your Order List \n And Grab The Order",

        ];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
        ];



        $headers = [
            'Authorization: key=' . $serverkey,
            'Content-Type: application/json',

        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        // curl_setopt($ch, CURLOPT_TIMEOUT_MS, 59); //in miliseconds
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


    }


    //OrderPlace
    public function OrderPlace(Request $request,$id){
        // return $request->all();
        //validateion
        $request->validate([
            'billing_phone' => 'required|min:11',
            'billing_address' => 'required|min:2',
        ]);


        //order
        $order = new Order;
        $order->customer_id = $id;
        $order->session_id = Session::get('session_id');
        $order->date = Carbon::now();
        $order->total = $request['total'];
        $order->grand_total = $request['grand_toal'];
        $order->delivery_charge = $request['delivery_charge'];
        $order->phone = $request['billing_phone'];
        $order->address = $request['billing_address'];
        $order->area_id = $request['area'];
        $order->sub_area_id = $request['sub_area_id'];
        $order->payment_type = $request['paymentMethod'];
        $order->save();

        //order items
        $carts = Cart::with('product')->where('session_id',Session::get('session_id'))->get()->toArray();
        foreach($carts as $cart){
            $order_items = new OrderItem;
            $order_items->order_id = $order->id;
            $order_items->shop_id = $cart['shop_id'];
            $order_items->product_id = $cart['product']['id'];
            $order_items->quantity = $cart['quantity'];
            $order_items->unit_cost = $cart['product']['price'];
            $order_items->sub_total = $cart['sub_total'];
            $order_items->save();
        }

        $customer = User::where('id',$id)->first();
        $customer['billing_address'] = $request['billing_address'];
        $customer['billing_phone'] = $request['billing_phone'];
        $customer->save();




        //push notification
        $Shop_carts = Cart::where('session_id',Session::get('session_id'))->select('shop_id')->distinct()->get()->toArray();

        $serverkey = 'AAAAAjKhGfQ:APA91bFiHMApm1ff6pUK3Iq1UhYAoMchL51QX8DEidR9IC_SbXxOlZXqmiyr-ishHIGq9bSQFAZLriCMpn_9dqwNb9pRWLIbjt1Pe8m4QPUOvDe5N6JOLymUjO9nkIqsMBB3VYZTPy_2';
         $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
         foreach($Shop_carts as $cart){
        //  $token = 'cKMWd_i-424LH6uYler2Y6:APA91bHs0hhQCK763-Rh7DMpWLBGDtsNqPazI2W0gpyTIMKkalf7FvSNX7SehBTQmfcj6kXZ6luH0dmji4aI8-6EMAW6Wmt5EI7KOih6fS_OmBarZSCTOoqq-sZt6ri9oDnK88YC-sgl';
            $dev_token = ShopDeviceToken::where('shop_id',$cart['shop_id'])->first();

            $token = $dev_token['device_token'];
            // return $token;die;
            $notification = [
                    'title' => "You Have An Order",
                    'body' => "Please Check Your Order List \n You Have A New Order",

                ];

                $fcmNotification = [
                    //'registration_ids' => $tokenList, //multple token array
                    'to'        => $token, //single token
                    'notification' => $notification,
                ];



                $headers = [
                    'Authorization: key=' . $serverkey,
                    'Content-Type: application/json',

                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$fcmUrl);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
                $result = curl_exec($ch);
                curl_close($ch);

                $deliver = $this->NotifyDeliveryMan();
            }
                // echo $result;
                return redirect()->back()->with("message","Order Placed Successfully");
    }


}
