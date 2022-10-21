<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\MenuGroupController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
--------------------------------------------------------------------------
| Auth Routes
--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'registerpage']);

Route::get('/login', [AuthController::class, 'loginpage']);

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');



Route::middleware(['isLoggedin'])->group (function() {

    Route::get('/', [MenuGroupController::class, 'home'])->name('home');

    Route::get('/menu', [MenuGroupController::class, 'index'])->name('nav');

    Route::get('/addmenugroup', [MenuGroupController::class, 'create']);

    Route::post('/addmenugroup', [MenuGroupController::class, 'store'])->name('addmenugroup');

    Route::get('/editmenugroup/{id}', [MenuGroupController::class, 'edit'])->name('editgroup');

    Route::post('/editmenugroup', [MenuGroupController::class, 'update'])->name('updategroup');

    Route::get('/addmenugroup/{id}', [MenuGroupController::class, 'destroy'])->name('deletemenugroup');



    Route::get('menu/item/{id}', [MenuItemController::class, 'index'])->name('item');

    Route::get('/item/add/{id}', [MenuItemController::class, 'create'])->name('additem');

    Route::post('/item/store', [MenuItemController::class, 'store'])->name('storeitem');

    Route::get('/item/edit/{id}', [MenuItemController::class, 'edit'])->name('edititem');

    Route::post('/item/update', [MenuItemController::class, 'update'])->name('updateitem');

    Route::get('/item/delete/{id}', [MenuItemController::class, 'destroy'])->name('deleteitem');




    Route::get('/promo', [PromoController::class, 'index'])->name('promo');

    Route::get('/addpromo', [PromoController::class, 'create'])->name('createPromo');

    Route::post('/addpromo', [PromoController::class, 'store'])->name('storePromo');

    Route::get('/promo/delete/{id}', [PromoController::class, 'destroy'])->name('deletePromo');


    Route::get('/promo/{id}/{promoCode}', [PromoController::class, 'show'])->name('promoUser');

    Route::get('/promo/deleteuser/{promo_id}/{id}', [PromoController::class, 'delete'])->name('deletePromoUser');



    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');

    Route::get('/addreservation', [ReservationController::class, 'create'])->name('createReservation');

    Route::post('/addreservation', [ReservationController::class, 'store'])->name('storeReservation');

    Route::get('/reservation/delete/{id}', [ReservationController::class, 'destroy'])->name('deleteReservation');



    Route::get('/highlight', [HighlightController::class, 'index'])->name('highlight');

    Route::get('/addhighlight', [HighlightController::class, 'create'])->name('createHighlight');

    Route::post('/addhighlight', [HighlightController::class, 'store'])->name('storeHighlight');

    Route::get('/highlight/delete/{id}', [HighlightController::class, 'destroy'])->name('deleteHighlight');


});


/*
--------------------------------------------------------------------------
| Web Routes
--------------------------------------------------------------------------
*/



