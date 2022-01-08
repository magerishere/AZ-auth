<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
   return array_keys(config('auth.guards'));
});

Route::prefix('auth')->middleware('guest:web,seller')->group(function() {
    Route::view('/register','auth.register')->name('register.index');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::view('/login','auth.login')->name('login.index');
    Route::post('/login',[AuthController::class , 'login'])->name('login');

});

Route::prefix('user')->middleware('auth:web,seller')->group(function() {
    Route::get('/dashboard',[UserController::class ,'dashboard'])->name('dashboard');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});