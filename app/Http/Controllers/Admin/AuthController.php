<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller

{
    public function create()
    {
        return view('admin.register');
    }

    public function login(Request $request){
        if(!Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            throw ValidationException::withMessages([
                'email' => 'Invali email or Password'
            ]);
        }
        return redirect()->intended(route('admin.home'));
        
       
    }
    public function destroy(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
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
        ]);
       
        // return $request->phone;
        $image = $request->file('image');
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'admin/images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        Auth::login($user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image'    => $imageUrl,
            'phone' => $request->phone,
        ]));

        event(new Registered($user));

        return redirect('/admin/login');
    }
    
    
}
