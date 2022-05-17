<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;





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
Route::get("/", [HomeController::class, 'index']);
Route::get("/detail/{id}", [ProductController::class, 'detail']);
Route::get("poroducts", [ProductController::class, 'search']);
Route::get("/registration", [RegistrationController::class, 'showRegistrationForm'])->name('registration');
Route::post("/registration", [RegistrationController::class, 'registration']);

Route::group(['middleware' => 'auth'], function () {
    Route::post("add_to_cart", [ProductController::class, 'addToCart']);
    Route::post("buy-now", [ProductController::class, 'buyNow']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get("cartlist", [ProductController::class, 'cartList']);
    Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
    Route::get("ordernow", [ProductController::class, 'orderNow'])->name('orderNow');
    Route::post("orderplace", [ProductController::class, 'orderPlace']);
    Route::get("myorder", [ProductController::class, 'myOrder']);
    Route::get("product/quantity/{type}", [ProductController::class, 'increamentOrDecrment']);
    
    
    // Admin routes
    Route::get("/products", [AdminProductController::class, 'listing'])->name('products.listing');
    Route::get("/product/create", [AdminProductController::class, 'create'])->name('products.create-product');
    Route::get("/product/edit/{id}", [AdminProductController::class, 'edit'])->name('product.edit');
    Route::post("/product/edit", [AdminProductController::class, 'update'])->name('product.update');
    Route::post("/product/create", [AdminProductController::class, 'store'])->name('products.store-product');
    Route::get("/product/delete/{id}",[AdminProductController::class,'deleteProduct'])->name('product.delete');
    Route::get("/removeimage/{id}", [ProductController::class, 'removeImage']);
    Route::get("/product/status-update/{id}",[AdminProductController::class,'Status_Update'])->name('product.status-update');
    Route::get("/category/add", [CategoryController::class, 'create'])->name('category.create');
    Route::post("/category/add", [CategoryController::class, 'addCategory'])->name('category.add');
    Route::get("/categories", [CategoryController::class, 'CategoryList'])->name('category.list');
    Route::get("/category/edit/{id}", [CategoryController::class, 'Category_edit'])->name('category.edit');
    
    Route::get("/category/delete/{id}", [CategoryController::class, 'Category_delete'])->name('category.delete');

});



Route::get('/admin', function(){

    return view('admin.dashboard');
});


