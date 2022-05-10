<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('show.home');

Route::get('listProduct/{id}', [ControllersCategoryController::class, 'getListProduct'])->name('show.list.products.by.categoy');
Route::get('detail/{id}', [ControllersProductController::class, 'detail'])->name('show.detail');



Route::get('register', [RegisterController::class, 'index'])->name('show.register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'index'])->name('show.login');
Route::post('login', [LoginController::class, 'login']);

Route::post('/add-to-cart', [CartController::class, 'addProduct'])->name('add.to.cart');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('show.admin');

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('show.list.category');
            Route::get('create', [CategoryController::class, 'create'])->name('create.category');
            Route::post('create', [CategoryController::class, 'store']);
            Route::get('update/{id}', [CategoryController::class, 'edit'])->name('edit.category');
            Route::post('update/{id}', [CategoryController::class, 'update']);
            Route::get('/{action}/{id}', [CategoryController::class, 'action'])->name('action.category');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('show.list.product');
            Route::get('create', [ProductController::class, 'create'])->name('create.product');
            Route::post('create', [ProductController::class, 'store']);
            Route::get('update/{id}', [ProductController::class, 'edit'])->name('edit.product');
            Route::post('update/{id}', [ProductController::class, 'update']);
            Route::get('/{action}/{id}', [ProductController::class, 'action'])->name('action.product');
        });

        Route::prefix('transaction')->group(function () {
            Route::get('/', [TransactionController::class, 'index'])->name('show.list.transaction');
        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('show.list.user');
        });
    });
});