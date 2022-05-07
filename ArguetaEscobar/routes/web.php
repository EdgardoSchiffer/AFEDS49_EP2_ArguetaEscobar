<?php

use App\Http\Controllers\ProductosController;
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductosController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductosController::class, 'create'])->name('products.create');
Route::post('/products', [ProductosController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductosController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductosController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductosController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductosController::class, 'destroy'])->name('products.destroy');

Auth::routes();