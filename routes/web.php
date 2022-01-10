<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\productController;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/login", [LoginController::class, 'showLoginForm'])->name('login');
Route::post("/login",[LoginController::class,'login']);
Route::get("/",[productController::class,'index']);
Route::get("/detail/{id}",[productController::class,'detail']);
Route::get("search",[productController::class,'search']);


Route::group(['middleware' => 'auth'], function() { 
    Route::post("add_to_cart",[productController::class,'addToCart']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get("cartlist",[productController::class,'cartList']);
    Route::get("removecart/{id}",[productController::class,'removeCart']);
});