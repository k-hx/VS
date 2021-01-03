<?php

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
    return view('welcome');
});

Auth::routes();

//category
Route::get('/insertCategory', function() {
    return view('insertCategory');
});

Route::post('/insertCategory/store', [App\Http\Controllers\CategoryController::class,'store'])->name('addCategory');

Route::get('showCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('showCategory');

Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');


//product
Route::get('insertProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('insertProduct');

Route::post('/insertProduct/store', [App\Http\Controllers\ProductController::class, 'store'])->name('addProduct');

Route::get('/showProduct', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');

Route::get('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');

Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('deleteProduct');

Route::post('/updateProduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');

Route::post('/searchProduct', [App\Http\Controllers\ProductController::class, 'search'])->name('search.product');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'showProducts'])->name('products');

Route::get('/product_detail/{id}', [App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('product.detail');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


