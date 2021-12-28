<?php

use App\Http\Controllers\Shopkeeper\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('shopkeeper')->middleware('theme:shopkeeper')->name('shopkeeper.')->group(function(){

    Route::middleware(['guest:shopkeeper'])->group(function(){
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login',[AuthController::class,'login']);

        Route::view('/register', 'auth.register')->name('register');
        
       
    });

   
     Route::middleware(['auth:shopkeeper'])->group(function(){
        Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');
     });
});