<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Shopkeeper\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Shopkeeper Login
Route::prefix('shopkeeper')->middleware('theme:shopkeeper')->name('shopkeeper.')->group(function(){
    Route::middleware(['guest:shopkeeper'])->group(function(){
        Route::post('/login',[AuthController::class,'login']);
    });
     Route::middleware(['auth:shopkeeper'])->group(function(){
        Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');
     });
});


//Admin Login
Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
    Route::post('/login',[ApiController::class, 'AdminLogin']);
    });


    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
        Route::view('/home','home')->name('home');

    });

});




//Shopkeeper Api
Route::post('/shopkeeper-request',[AuthController::class,'store']);
Route::get('/shopkeeper/shop-info/{id}',[ApiController::class,'shopInfo']);
Route::post('/shopkeeper/shop-update/{id}',[ApiController::class,'shopUpdate']);
Route::post('/shopkeeper/shop-cover-upload/{id}',[ApiController::class,'shopCover']);
Route::get('/shopkeeper/shop-cover-image/{id}',[ApiController::class,'shopCoverImage']);
Route::get('/shop-status/view/{id}',[ApiController::class,'shopStatus']);
Route::post('/shop-status/update/{id}',[ApiController::class,'shopStatusUpdate']);
Route::get('/all-shop',[ApiController::class,'allShop']);
Route::get('/product-information/{id}',[ApiController::class,'productInfo']);
Route::post('/product-information/update/{id}',[ApiController::class,'productInfoUpdate']);
Route::get('/product-status/view/{id}',[ApiController::class,'productStatus']);
Route::post('/product-status/update/{id}',[ApiController::class,'productStatusUpdate']);

//Delivery man
Route::post('/delivery-man/login',[ApiController::class,'deliveryManLogin']);
Route::get('/delivery-man/image/{id}',[ApiController::class,'deliveryManImage']);
Route::post('/delivery-man/image/update/{id}',[ApiController::class,'deliveryManImageUpdate']);
Route::get('/delivery-man/information/{id}',[ApiController::class,'deliveryManInfo']);
Route::post('/delivery-man/information-update/{id}',[ApiController::class,'deliveryManInfoUpdate']);
Route::post('/delivery-man/change-password/{id}',[ApiController::class,'deliveryManChangePassword']);


Route::get('/categories',[ApiController::class,'Category']);
Route::get('/sub-categories',[ApiController::class,'SubCategory']);

Route::get('/sliders/{category_id}',[ApiController::class,'Slider']);

//Customer Api Route
Route::post('/customer-login',[ApiController::class,'CustomerLogin']);
Route::post('/verify-code',[ApiController::class,'VerifyCode']);
Route::get('/subcategory-wise-products/{id}',[ApiController::class,'SubcategoryWiseProduct']);
Route::get('/product-details',[ApiController::class,'ProductDetails']);
Route::get('/category-wise-products/{category_id}',[ApiController::class,'CategoryWiseProduct']);
Route::get('/category-wise-subcategory/{category_id}',[ApiController::class,'CategoryWiseSubcategory']);
Route::get('/shop-wise-products/{shop_id}',[ApiController::class,'ShopWiseProducts']);
Route::post('/search-products',[ApiController::class,'SearchProduct']);
Route::match(['get','post'],'/cart/{product_id}',[ApiController::class,'Cart']);
Route::post('/cart-detail',[ApiController::class,'CartDetails']);
Route::post('/update-quantity-minus/{cart_id}',[ApiController::class,"QuantityUpdateMinus"]);
Route::post('/update-quantity-plus/{cart_id}',[ApiController::class,"QuantityUpdatePlus"]);
Route::post('/apply-coupon',[ApiController::class,'CouponApply']);
Route::post('/checkout',[ApiController::class,'CheckoutForm']);
Route::get('/area',[ApiController::class,'Area']);
Route::get('/sub-area/{area_id}',[ApiController::class,'SubArea']);
Route::post('/delivery-charge-calculate',[ApiController::class,'DeliveryChargeCal']);
Route::post('/order-details',[ApiController::class,'OrderDetails']);













//Vendor Api Route
Route::post('/add-product',[ApiController::class,'AddProduct']);


