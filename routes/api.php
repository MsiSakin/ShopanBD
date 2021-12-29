<?php

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

//Admin Api Route
Route::post('/shopkeeper-request',[AuthController::class,'store']);
Route::get('/categories',[ApiController::class,'Category']);

Route::get('/sub-categories',[ApiController::class,'SubCategory']);
Route::get('/sliders',[ApiController::class,'Slider']);

//Vendor Api Route
