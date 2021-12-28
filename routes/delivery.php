<?php

use App\Http\Controllers\Delivery\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('delivery')->middleware('theme:delivery')->name('delivery.')->group(function(){
    Route::middleware(['guest:delivery'])->group(function(){
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login',[AuthController::class,'login']);
    Route::view('/register','auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    });

    Route::middleware(['auth:delivery'])->group(function(){
        Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');
     });

});