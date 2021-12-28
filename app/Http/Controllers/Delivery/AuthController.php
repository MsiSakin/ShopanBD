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
    public function login(Request $request){
        if(!Auth::guard('delivery')->attempt($request->only('email','password'),$request->filled('remember'))){
            throw ValidationException::withMessages([
                'email' => 'Invali email or Password'
            ]);
        }
        return redirect()->intended(route('delivery.home'));
        
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|min:11',
            'image' => 'required',
            'address' => 'required',
        ]);
       
       

        // return $request->phone;
        $image = $request->file('image');
        
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'delivery/images/deliveryman/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

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
}
