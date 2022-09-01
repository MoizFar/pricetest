<?php

use Illuminate\Support\Facades\Auth;
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




Auth::routes();
Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/admin/adminlogout', [App\Http\Controllers\HomeController::class, 'adminlogout']);
Route::post('/admin/userlogin', [App\Http\Controllers\Auth\LoginController::class, 'userlogin']);


Route::group(['middleware' =>['admin']], function()
{
  Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    // product-categories


    Route::get('/categories', [App\Http\Controllers\Category\CategoryController::class, 'categories']);
    Route::get('/category/{id?}', [App\Http\Controllers\Category\CategoryController::class, 'category']);
    Route::post('/saveproduct-category', [App\Http\Controllers\Category\CategoryController::class, 'savecategory']);
    Route::get('/deleteproduct-category/{id}', [App\Http\Controllers\Category\CategoryController::class, 'deleteproductcategory']);

    //Products
    Route::get('/products', [App\Http\Controllers\Product\ProductController::class, 'products']);
    Route::get('/product/{id?}', [App\Http\Controllers\Product\ProductController::class, 'product']);
  
    Route::post('/saveproduct', [App\Http\Controllers\Product\ProductController::class, 'saveproduct']);
    Route::get('/deleteproduct/{id}', [App\Http\Controllers\Product\ProductController::class, 'deleteproduct']);

});

});
