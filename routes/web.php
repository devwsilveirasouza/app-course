<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
// ROTA INICIAL PADRÃO
Route::get('/', HomeController::class)->name('home');

Route::get('/product',                       [ProductController::class,'index'])->name('product.index');
Route::get('/product-create',                [ProductController::class,'create'])->name('product.create');
Route::post('/product-store',                [ProductController::class,'store'])->name('product.store');
Route::get('/product-show/{product}',        [ProductController::class,'show'])->name('product.show');
Route::get('/product-edit/{product}',        [ProductController::class,'edit'])->name('product.edit');
Route::put('/product-update/{product}',      [ProductController::class,'update'])->name('product.update');
Route::delete('/product-delete/{product}',   [ProductController::class,'destroy'])->name('product.destroy');
