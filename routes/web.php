<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Auth::routes();

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('auth/google/callback',[OAuthController::class, 'callback'])->name('google-callback');
Route::get('auth/google',[OAuthController::class, 'redirect'])->name('google-auth');

Route::get('/search',[SearchController::class, 'index']);
Route::get('/book/works/{id}',[BookController::class, 'show']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('commonlibrary',[BookController::class, 'showall']);
    Route::get('library',[BookController::class, 'showlibrary']);
    Route::get('library/offer/{id}',[BookController::class, 'showlibrary']);
    Route::get('library/select/{id}/{userid}',[BookController::class, 'showuserlibrary']);
    Route::post('book',[BookController::class, 'store']);
    Route::post('book/{id}',[BookController::class, 'update']);
    Route::post('book/delete/{id}',[BookController::class, 'destroy']);
    Route::post('wish',[WishController::class,'store']);
    Route::get('cart',[CartController::class,'index']);
    Route::post('cart',[CartController::class,'store']);
    Route::post('remove',[CartController::class,'remove']);
    Route::get('orders',[OrderController::class,'index']);
    Route::post('offer/{id}',[OrderController::class, 'update']);
    Route::post('order',[OrderController::class,'store']);
    Route::post('order/{id}',[OrderController::class,'destroy']);
});

Route::get('/test',function(){
    echo (Cart::content());
});

Route::get('/empty',function(){
    Cart::destroy();
});