<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mobile\AuthController;
use App\Http\Controllers\mobile\MenuController;
use App\Http\Controllers\mobile\UserController;
use App\Http\Controllers\mobile\PromoController;
use App\Http\Controllers\mobile\AdvertController;
use App\Http\Controllers\mobile\AllMobileController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signin', [AuthController::class, 'signin']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/contact-us', [AllMobileController::class, 'contactUs']);

Route::get('/get-all-data', [AllMobileController::class, 'getAllData']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/signout', [AuthController::class, 'signout']);
    Route::get('/get-user', [UserController::class, 'getUserDetails']);
    Route::post('/user-update', [UserController::class, 'updateUser']);
    Route::post('/promo-code', [PromoController::class, 'promo']);
    Route::get('/get-user-promos', [PromoController::class, 'getUserPromo']);

});


