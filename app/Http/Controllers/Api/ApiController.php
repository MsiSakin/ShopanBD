<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Shopkeeper;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
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

                'message'=>"Invalid Admin!"
            ],200);
        }else{
            $admin = Admin::where('email',$request->email)->first();
            return response()->json([
                'data'=>$admin,
                'status'=>true
            ],200);
        }
       


    }

    //category api
    public function Category(){
        $category = Category::where('status',1)->select('id','category_name','category_image')->get()->toArray();
        if (!empty($category)){
            return response()->json([
                'data'=>$category,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Category Not Found"
            ],200);
        }
    }

    //sub category api
    public function SubCategory(){
        $subcategory = Subcategory::with('Category')->where('status',1)->select('id','category_id','sub_category_name','sub_category_image')->get()->toArray();
        if (!empty($subcategory)){
            return response()->json([
                'data'=>$subcategory,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Sub Category Not Found"
            ],200);
        }
    }


    //slider api
    public function Slider($category_id){
        $slider = Slider::where('category_id',$category_id)->where('status',1)->select('id','category_id','slider')->get()->toArray();
        if (!empty($slider)){
            return response()->json([
                'data'=>$slider,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Slider Not Found"
            ],204);
        }
    }

    public function CustomerLogin(Request $request){

        $validation = Validator::make($request->all(),[
            'phone' => 'required|min:11|unique:users',
        ]);

        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json([
                'message'=>$errors,
                'status'=>false
            ],200);
        }else{

            $customer = new User;
            $code = rand(0, 9999);

            $customer->phone = $request['phone'];
            $customer->code = $code;
            $customer->save();

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

            //Result

            if(isset($smsresult)){
                return response()->json([
                    'status'=> true,
                    'message'=>"OTP Sent Successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>"Invalid OTP"
                ],200);
            }
        }
    }

    //VerifyCode
    public function VerifyCode(Request $request){
        if(!empty($request['code'])){
            $user = User::where('code',$request['code'])->count();
            if($user > 0){
                return response()->json([
                    'status'=> true,
                    'message'=>"Login Successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=>"Invalid OTP"
                ],200);
            }
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Invalid OTP"
            ],200);
        }
    }


}
