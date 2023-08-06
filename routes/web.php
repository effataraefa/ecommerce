<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/do-login',[UserController::class,'doLogin'])->name('admin.do.login');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');



Route::get('/categories', [CategoryController::class, 'list'])->name('category.list');
Route::get('/category-form', [CategoryController::class, 'categoryForm'])->name('category.form');
Route::post('/category-store', [CategoryController::class, 'categoryStore'])->name('category.store');

Route::get('/brand', [BrandController::class, 'list'])->name('brand.list');
Route::get('/brand-form', [BrandController::class, 'brandForm'])->name('brand.form');
Route::post('/brand-store', [BrandController::class, 'brandStore'])->name('brand.store');


Route::get('/product', [ProductController::class, 'list'])->name('product.list');
Route::get('/product-form', [ProductController::class, 'form'])->name('product.form');
Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
});