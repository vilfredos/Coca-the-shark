<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');

Route::get('/select-flavors', [ProductController::class, 'selectFlavors'])->name('select.flavors');
Route::post('/order-flavors', [ProductController::class, 'orderFlavors'])->name('order.flavors');

