<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ShopkeeperController;

use App\Http\Controllers\Admin\DeliveryManController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    Route::view('/register','auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    });


    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
        Route::view('/home','home')->name('home');

        //shopkepper
        Route::get('/shopkeeper-list',[ShopkeeperController::class,'vendorList'])->name('vendor.list');
        Route::get('/shopkeeper-details',[ShopkeeperController::class,'vendorDetails'])->name('vendor.details');
        Route::post('/percentage-update/{id}',[ShopkeeperController::class,'updatePercent']);
        // Route::match(['get','post'],'/delete-shopkeepers/{id}',[ShopkeeperController::class, 'destroy']);
        Route::match(['get','post'],'/activating-vendor/{id}',[ShopkeeperController::class, 'StatusActive']);
        Route::match(['get','post'],'/inactivating-vendor/{id}',[ShopkeeperController::class, 'StatusInactive']);

         //delivery man
         Route::get('/add-deliveryMan',[DeliveryManController::class,'addDeliveryMan'])->name('add.deliveryMan');
         Route::post('/add-deliveryMan',[DeliveryManController::class,'storeDeliveryMan'])->name('store.deliveryMan');
         Route::get('/deliveryMan-list',[DeliveryManController::class,'deliveryManList'])->name('deliveryMan.list');
         Route::match(['get','post'],'/inactivating-deliveryMan/{id}',[DeliveryManController::class, 'StatusInactive']);
         Route::match(['get','post'],'/activating-deliveryMan/{id}',[DeliveryManController::class, 'StatusActive']);


         //View Shop
         Route::get('/view-shop/{id}',[ShopkeeperController::class,'viewShop']);


         //category
        //  Route::get('/add-category',[CategoryController::class,'AddCategory'])->name('add.category');
         Route::post('/add-category/{id}',[CategoryController::class,'storeCategory'])->name('store.category');
         Route::get('/category-list',[CategoryController::class,'categoryList'])->name('category.list');
         Route::post('/category-status',[CategoryController::class,'categoryStatus']);
         Route::get('/category/edit/{id}',[CategoryController::class,'CategoryEdit']);


         //sub category
         Route::get('/add-subcategory',[CategoryController::class,'AddSubCategory'])->name('add.subcategory');
         Route::post('/add-subcategory',[CategoryController::class,'storeSubCategory'])->name('store.subcategory');
         Route::get('/subcategory-list',[CategoryController::class,'SubCategoryList'])->name('subcategory.list');
         Route::post('/subcategory-status',[CategoryController::class,'SubCategoryStatus']);
         Route::get('/subcategory/edit/{id}',[CategoryController::class,'SubCategoryEdit']);
         Route::post('/update-subcategory/{id}',[CategoryController::class,'UpdateSubCategory']);

         //slider
         Route::get('/slider-list',[SliderController::class,'sliderList'])->name('slider.list');
         Route::get('/add-slider',[SliderController::class,'addSlider']);
         Route::post('/slider-store',[SliderController::class,'storeSlider']);
         Route::post('/slider-status',[SliderController::class,'sliderStatus']);
         Route::get('/slider/edit/{id}',[SliderController::class,'sliderEdit']);
         Route::post('/slider-update/{id}',[SliderController::class,'UpdateSlider']);

         //coupon
         Route::get('/coupon-details',[CouponController::class,'CouponDetails']);
         Route::get('/add-coupon',[CouponController::class,'CouponAdd']);
         Route::post('/coupon/store',[CouponController::class,'CouponStore']);
         Route::post('/coupon-status',[CouponController::class,'couponStatus']);

         //set area
        Route::get('/location-details',[CouponController::class,'SetLocation']);
        Route::get('/add-location',[CouponController::class,'AddLocation']);
        Route::get('/area-create',[CouponController::class,'AddArea']);
        Route::post('/area-store',[CouponController::class,'StoreArea']);
        Route::post('/locate-set-store',[CouponController::class,'StoreLocation']);
    });

});
