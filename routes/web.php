<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/categories/{id}',[HomeController::class,'CategoryShow']);
Route::get('/sub-categories/{id}',[HomeController::class,'SubcategoryShow']);
Route::get('/categorywise_shop/{id}',[HomeController::class,'Shop']);
Route::get('/shop/{id}',[HomeController::class,'ShopProduct']);
Route::get('/product-details/{product_id}',[HomeController::class,'productDetails']);
Route::get('/cart/{id}',[HomeController::class,'Cart']);
Route::get('/cart-details',[HomeController::class,'CartDetails']);
Route::get('/update-quantity-minus/{cart_id}',[HomeController::class,"QuantityUpdateMinus"]);
Route::get('/update-quantity-plus/{cart_id}',[HomeController::class,"QuantityUpdatePlus"]);
Route::post('/apply-coupon',[HomeController::class,'CouponApply']);
Route::get('/checkout',[HomeController::class,'Checkout']);
Route::post('/user-login',[HomeController::class,'UserLogin']);
Route::post('/user-code',[HomeController::class,'UserCode']);
Route::get('/checkout-form',[HomeController::class,'CheckOutForm']);
Route::get('/delivery-charge-cal',[HomeController::class,'DeliveryChargeCal']);
Route::post('/order-place/{id}',[HomeController::class,'OrderPlace']);

//admin panel
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/shopkeeper.php';
require __DIR__.'/delivery.php';
