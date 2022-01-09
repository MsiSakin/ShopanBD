<?php

namespace App\Http\Controllers\Shopkeeper;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopImage;
use App\Models\Shopkeeper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;



class AuthController extends Controller
{
    public function login(Request $request){
        if(!Auth::guard('shopkeeper')->attempt($request->only('phone','password'),$request->filled('remember'))){


                return response()->json([
                    'status'=>false,
                    'message'=>'Invalid Shopkeeper'
                ],200);

        }else{
            $shopkeeper = Shopkeeper::where('phone',$request->phone)->first();
            if($shopkeeper->status == 0){
                return response()->json([
                    'message'=> 'You are currently invalid! Please contact with admin',
                    'status'=>false
                ],200);
            }else{
                return response()->json([
                    'data'=>$shopkeeper,
                    'status'=>true
                ],200);
            }
            
        }

    }
    public function destroy(){
        Auth::guard('shopkeeper')->logout();
        return redirect('/');
    }

        //Shopkeeper Store
        public function store(Request $request)
        {


            if(empty($request['name']) || empty($request['phone']) || empty($request['password'])   ){
                $error_message='Please Fill All the Field';
            }
            if(isset($error_message)){
                return response()->json([
                    'error'=>$error_message,
                    'status'=>false
                ],200);
            }

            $validation = FacadesValidator::make($request->all(),[
               
             
                
                
                
               
               
                'shop_description' => 'required',
                
            ]);

            if(empty($request['phone'])){
                $error_message = "Please Add Phone Number!";
            }

            if(!empty($request['phone'])){
                if ($request['phone'] < 11 || $request['phone'] > 11 ){
                    $error_message = "Phone Number Length 11 Digit !";
                }
                $vendor_phone = Shopkeeper::where('phone',$request['phone'])->count();
                if ($vendor_phone > 0){
                    $error_message = "Phone already exits!";
                }
            }

        
            if(empty($request['password'])){
                $error_message = "Please Add Password!";
            }

            if(!empty($request['password'])){
                if($request['password']<8){
                    $error_message = "Password Length Minimum 8 Digits!";
                }           
            }

            if(!isset($request['image'])){
                    $error_message = "Please insert Image!";          
            }

            if(!empty($request['email'])){
                if(!filter_var($request['email'],FILTER_VALIDATE_EMAIL)){
                    $error_message = "Please Enter VAlid Email!";  
                }
                $vendor_email = Shopkeeper::where('email',$request['email'])->count();
                if ($vendor_email > 0){
                    $error_message = "Email already exits!";
                }
            }

            if(!empty($request['shop_phone'])){
                if ($request['shop_phone'] < 11 || $request['shop_phone'] > 11 ){
                    $error_message = "Shop Phone Number Length 11 Digit!";
                }
                $shop_phone = Shop::where('shop_phone',$request['shop_phone'])->count();
                if ($shop_phone > 0){
                    $error_message = "Shop Phone already exits!";
                }
            }

            if(empty($request['shop_address'])){
                $error_message = "Please Add Shop Address!";
            }

            if(!isset($request['banner'])){
                $error_message = "Please insert shop profile image!";          
            }

            if(empty($request['category_id'])){
                $error_message = "Please Select Shop Category!";
            }

            if(empty($request['shop_description'])){
                $error_message = "Please add a shop description!";
            }
        
            if (isset($error_message) && !empty($error_message)){
                return response()->json([
                    "status"=>false,
                    "message"=>$error_message,
                ],200);
            } else{
                if($request->image && $request->banner){
                    $image = $request->file('image');
                    $imageName = uniqid().'.'.$image->extension();
                    $directory = 'shopkeeper/images/';
                    $image->move($directory, $imageName);
                    $imageUrl = $directory.$imageName;

                    $banner = $request->file('banner');
                    $bannerName = uniqid().'.'.$banner->extension();
                    $directory2 = 'shopkeeper/images/shop/';
                    $banner->move($directory2, $bannerName);
                    $bannerUrl = $directory2.$bannerName;
         
    
                    $shopkeeper_id=  Shopkeeper::insertGetId([
                        
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'image'   => $imageUrl,
                        'phone' => $request['phone'],
                        'description' => $request['description'],
                        'varified_at' => '',
                        'status' => '0',
                        'percentage' => '0',
                    ]);

                    $shop = new Shop();
                    $shop->shop_name = $request->shop_name;
                    $shop->category_id = $request->category_id;
                    $shop->shopkeeper_id = $shopkeeper_id;
                    $shop->shop_address = $request->shop_address;
                    $shop->banner = $bannerUrl;
                    $shop->shop_description = $request->shop_description;
                    $shop->shop_phone = $request->shop_phone;
                    $shop->shop_status = '0';
                    $shop->save();
                   
                    if(!@empty($shop)){
                        return response()->json([
                            'message'=>'Shopkeeper Request Successful',
                            'status'=>true

                        ],200);
                    }else{
                        return response()->json([
                            'message'=>'Invalid Request!',
                            'status'=>false
                        ],200);
                    }
                }


            }

        }


}
