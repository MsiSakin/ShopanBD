<?php

namespace App\Http\Controllers\Shopkeeper;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Shopkeeper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request){
        if(!Auth::guard('shopkeeper')->attempt($request->only('email','password'),$request->filled('remember'))){
            throw ValidationException::withMessages([
                'email' => 'Invali email or Password'
            ]);
        }
        return redirect()->intended(route('shopkeeper.home'));
        
    }
    public function destroy(){
        Auth::guard('shopkeeper')->logout();
        return redirect('/');
    }

    public function store(Request $request)
    {
        
        if(empty($request['name']) || empty($request['phone']) || empty($request['password'])   ){
            $error_message='Please Fill All the Field';
        }
        if(isset($error_message)){
            return response()->json([
                'error'=>$error_message,
            ],204);
        }

        $validation = FacadesValidator::make($request->all(),[ 
            'phone' => 'min:11|unique:shopkeepers',
            'password' => 'min:8',
            'shop_phone' => 'min:11|unique:shops',
            'shop_address' => 'required',
            'banner' => 'required',
        ]);
    
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json([
                'message'=>$errors,
            ],422);
   
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
    
                $shop = new Shop;
                $shop->shop_name = $request->shop_name;
                $shop->category_id = $request->category_id;
                $shop->shopkeeper_id = $shopkeeper_id;
                $shop->shop_address = $request->shop_address;
                $shop->banner = $request->banner;
                $shop->shop_description = $request->shop_description;
                $shop->shop_phone = $request->shop_phone;
                $shop->shop_status = '0';
                $shop->save();

               
                if(!@empty($shop)){
                    return response()->json([
                        'message'=>'Shopkeeper Request Successful',
                    ],200);
                }else{
                    return response()->json([
                        'message'=>'Invalid Request!',
                    ],204);
                }
            }
           
               
        }
       
    }
}
