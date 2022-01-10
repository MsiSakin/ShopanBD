<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function login(Request $request){
    //     if(!Auth::guard('delivery')->attempt($request->only('email','password'),$request->filled('remember'))){
    //         throw ValidationException::withMessages([
    //             'email' => 'Invali email or Password'
    //         ]);
    //     }
    //     return redirect()->intended(route('delivery.home'));
        
    // }


    public function login(Request $request){
        if(!Auth::guard('delivery')->attempt($request->only('phone','password'),$request->filled('remember'))){
                return response()->json([
                    'status'=>false,
                    'message'=>'Invalid Delivery Man!'
                ],200);

        }else{
            $deliveryMan = DeliveryMan::where('phone',$request->phone)->first();
            if($deliveryMan->status == 0){
                return response()->json([
                    'message'=> 'You are currently invalid! Please contact with admin',
                    'status'=>false
                ],200);
            }else{
                return response()->json([
                    'data'=>$deliveryMan,
                    'status'=>true
                ],200);
            }
            
        }

    }

    public function destroy(){
        Auth::guard('delivery')->logout();
        return redirect('/');
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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:delivery_men',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|min:11|unique:delivery_men',
            'image' => 'required',
            'address' => 'required',
        ]);
       
      
     
        // return $request->phone;
        $image = $request->file('image');
        
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'delivery/images/deliveryman/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        if(!@empty($request->docimage)){
                $image2 = $request->file('docimage');
                $imageName2 = uniqid().'.'.$image2->extension();
                $directory2 = 'delivery/images/documents/';
                $image2->move($directory2, $imageName2);
                $imageUrl2 = $directory2.$imageName2;

                Auth::login($user = DeliveryMan::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'image'    => $imageUrl,
                    'document_image'    => $imageUrl2,
                    'document_no' => $request->idno,
                    'status' => '1',
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]));
        
                event(new Registered($user));
        
                return redirect('/delivery/login');
        }


        Auth::login($deliveryMAn = DeliveryMan::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image'    => $imageUrl,
            'document_image'    => '',
            'document_no' => $request->idno,
            'status' => '1',
            'address' => $request->address,
            'phone' => $request->phone,
        ]));

        event(new Registered($deliveryMAn));

        return redirect('/delivery/login');

    }
}
