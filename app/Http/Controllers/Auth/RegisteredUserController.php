<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        if(empty($request['name']) || empty($request['phone']) || empty($request['image']) || empty($request['password']) || empty($request['address'])  ){
            $error_message='Please Fill All the Field';
        }
        if(isset($error_message)){
            return response()->json([
                'error'=>$error_message,
            ],204);
        }

        $validation = FacadesValidator::make($request->all(),[ 
            'phone' => 'min:11|unique:users',
            'password' => 'min:8',
            'email' => 'email|unique:users',
            
            
        ]);
    
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json([
                'message'=>$errors,
            ],422);
   
        }else{
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->extension();
            $directory = 'shopkeeper/images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;


            $user = new User;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->image   = $imageUrl;
            $user->phone = $request['phone'];
            $user->address = $request['address'];
            $user->varified_at = '';
            $user->status = '0';
            $user->save();

            if(!@empty($shopkeeper)){
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
