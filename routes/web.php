<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [UserController::class, 'createWelcome'])->name('welcome');


Route::get('/productdetail/{id}', [UserController::class, 'createProductDetail'])->name('productdetail');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('user/')->name('user/')->group(function () {
        Route::get('/success', function () {
            return view('success');
        })->name('success');

        Route::post('/productdetail', [UserController::class, 'storeProductDetail'])->name('productdetail');
        Route::get('/cart', [UserController::class, 'createCart'])->name('cart');
        Route::post('/cart', [UserController::class, 'storeCart'])->name('cart');
        Route::post('/quantityCart', [UserController::class, 'quantityCart'])->name('quantityCart');
        Route::post('/search', [UserController::class, 'search'])->name('search');
    });
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::prefix('admin/')->name('admin/')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'createDashboard'])->name('dashboard');

        Route::get('/barang', [AdminController::class, 'createBarang'])->name('barang');
        Route::get('/detail/barang/{id}', [AdminController::class, 'createDetailBarang'])->name('detail/barang');
        Route::get('/delete/barang/{id}', [AdminController::class, 'storeDeleteBarang'])->name('delete/barang');

        Route::get('/add/barang', function () {
            return view('admin.addBarang');
        })->name('add/barang');

        Route::post('/add/barang', [AdminController::class, 'storeBarang'])->name('add/barang');
        Route::get('/transaction/accept/{id}', [AdminController::class, 'acceptTransaction'])->name('transaction/accept');
        Route::get('/transaction/delete/{id}', [AdminController::class, 'deleteTransaction'])->name('transaction/delete');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';
