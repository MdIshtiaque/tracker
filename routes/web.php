<?php

use App\Http\Controllers\backend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\StatusController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order/create', [OrderController::class, 'store'])->name('orders.store');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/track', [OrderController::class, 'trackOrders'])->name('orders.track');


Route::post('/order/status/store', [StatusController::class, 'store'])->name('status.store');

Route::post('/current-port', [OrderController::class, 'currentPort'])->name('set.port');
