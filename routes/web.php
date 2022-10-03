<?php

use App\Http\Controllers\ProductsController;
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

// Show products
 Route::get('/products', [ProductsController::class, 'index'])->name('shopping');

// Add to Cart
Route::get('/products/add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('addToCart');

// Show Cart
Route::get('/products/show-cart', [ProductsController::class, 'showCart'])->name('showCart');

// Update Cart
Route::get('/products/update-cart', [ProductsController::class, 'updateCart'])->name('updateCart');

// Delete Cart
Route::get('/products/delete-cart', [ProductsController::class, 'deleteCart'])->name('deleteCart');

// Delete All Cart
Route::get('/products/delete-all-cart', [ProductsController::class, 'deleteAllCart'])->name('deleteAllCart');

// Checkout Form = Display
Route::get('/products/check-out-form', [ProductsController::class, 'checkOutForm'])->name('checkOutForm');

// Action Check Out = Store (submit)
Route::post('/products/check-out', [ProductsController::class, 'checkOut'])->name('checkOut');


