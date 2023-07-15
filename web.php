<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

{}

Route::view('/', 'welcome');
Auth::routes();
Route::get('/testData', [UserController::class, 'testData']);
Route::view('/userinner', 'userInner');


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/subscriber', [LoginController::class,'showSubscriberLoginForm']);
Route::get('/login/unPaidUser', [LoginController::class,'showSubscriberLoginForm']);

Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/subscriber',[RegisterController::class,'showSubscriberRegisterForm']);
Route::get('/register/unPaidUser',[RegisterController::class,'showUnpaidUserRegisterForm']);


Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/subscriber', [LoginController::class,'subscriberLogin']);
Route::post('/login/unPaidUser', [LoginController::class,'unPaidUserLogin']);

Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/subscriber', [RegisterController::class,'createSubscriber']);
Route::post('/register/unPaidUser', [RegisterController::class,'createUnPaidUser']);

Route::group(['middleware' => 'auth:subscriber'], function () {
Route::view('/subscriber', 'subscriber');
});
Route::group(['middleware' => 'auth:admin'], function () {
Route::view('/admin', 'admin');
});
Route::group(['middleware' => 'auth:unPaidUser'], function () {
    Route::view('/unPaidUser', 'unPaidUser');
    });
Route::get('logout', [LoginController::class,'logout']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/home','home');

Route::get("deleteUser/{id}", [UserController::class,'deleteUser']);
Route::get("updateUser/{id}", [UserController::class,'updateUser']);
Route::post("updateUser/{id}", [UserController::class,'showUpdate']);
