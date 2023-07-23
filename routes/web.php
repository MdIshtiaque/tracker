<?php

use App\Http\Controllers\backend\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order/create', [OrderController::class, 'store'])->name('orders.store');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/track', [OrderController::class, 'trackOrders'])->name('orders.track');
