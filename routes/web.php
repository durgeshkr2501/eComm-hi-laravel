<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\ProductController;



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
Route::post("/login", [LoginController::class, 'login']);
Route::get("/", [ProductController::class, 'index']);
Route::get("/detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::get("/registration", [RegistrationController::class, 'showRegistrationForm'])->name('registration');
Route::post("/registration", [RegistrationController::class, 'registration']);

Route::group(['middleware' => 'auth'], function () {
    Route::post("add_to_cart", [ProductController::class, 'addToCart']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get("cartlist", [ProductController::class, 'cartList']);
    Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
    Route::get("ordernow", [ProductController::class, 'orderNow']);
    Route::post("orderplace", [ProductController::class, 'orderPlace']);
    Route::get("myorder", [ProductController::class, 'myOrder']);
    Route::get("product/quantity/{type}", [ProductController::class, 'increamentOrDecrment']);
});
