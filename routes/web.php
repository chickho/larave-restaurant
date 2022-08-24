<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

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

Route::get('/', [DashboardController::class, 'voucher']);
// Route::get('/', [LoginController::class, 'guestLogin']);

Route::middleware('guest')->group(function(){
	Route::get('/login-as-guest', [LoginController::class, 'guestLogin']);
	Route::post('/login-as-guest', [LoginController::class, 'guestData']);
	Route::get('/login', [LoginController::class, 'index'])->name('login');
	Route::post('/login', [LoginController::class, 'authenticate']);
	Route::get('/register', [RegisterController::class, 'index']);
	Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function(){
	Route::post('/logout', [LoginController::class, 'logout']);
	Route::resource('table', TableController::class);
	Route::get('qrcode/{slug}', [TableController::class, 'qrcode']);
	Route::resource('cashier', CashierController::class);
	Route::resource('menu', MenuController::class);
	Route::resource('laporan', 'App\Http\Controllers\LaporanController');
	Route::resource('role', 'App\Http\Controllers\RoleController');
	Route::get('menu/sold/{slug}', [MenuController::class, 'sold']);
	Route::get('menu/ready/{slug}', [MenuController::class, 'ready']);
	Route::resource('voucher', VoucherController::class);
	Route::resource('user', UserController::class);
	Route::get('cashier/paid/{slug}', [CashierController::class, 'paid']);
	Route::post('cashier/status/{slug}', [CashierController::class, 'status']);
	Route::resource('kitchen', KitchenController::class);
	Route::resource('point', PointController::class);
	Route::post('/point/buy', [PointController::class, 'buy']);
	Route::get('order/{code}', [OrderController::class, 'qrcode']);
	Route::get('/order-voucher', [OrderController::class, 'showVoucher']);
	Route::resource('order', OrderController::class);
	Route::post('/payment', [OrderController::class, 'confirm']);
	Route::resource('history', HistoryController::class);
	Route::resource('user-voucher', UserVoucherController::class);
	Route::resource('outlet', 'App\Http\Controllers\OutletController');
	Route::resource('payments', 'App\Http\Controllers\PaymentController');
	Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
	Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
	Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
	Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
	Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});

