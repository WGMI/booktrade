<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

Route::get('auth/google',[OAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback',[OAuthController::class, 'callback'])->name('google-callback');
