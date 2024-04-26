<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\GoogleController;

use App\Http\Controllers\pages\AuthPage;
use App\Http\Controllers\pages\OrderPage;
use App\Http\Controllers\order\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$controller_path = 'App\Http\Controllers';
Route::get('/auth/google', [GoogleController::class,'redirectToProvider'])->name('auth-google-redirect');
Route::get('/auth/google/callback', [GoogleController::class,'handleProviderCallback'])->name('auth-google-callback');
Route::get('/auth/logout', [GoogleController::class,'logout'])->name('pages-login');

Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
Route::get('/page-order', [OrderPage::class,'index'])->name('pages-order');
Route::get('/page-login', [AuthPage::class,'loginGoogle'])->name('pages-login');

Route::get('/page-order-data', [OrderPage::class,'listOrder'])->name('pages-order-data');

Route::post('/order', [OrderController::class,'store'])->name('post-order');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
