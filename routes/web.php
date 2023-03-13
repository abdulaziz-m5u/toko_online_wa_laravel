<?php

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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // admin
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('attributes', \App\Http\Controllers\Admin\AttributeController::class);
    Route::resource('attributes.attribute_options', \App\Http\Controllers\Admin\AttributeOptionController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('products.product_images', \App\Http\Controllers\Admin\ProductImageController::class);
});

Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');
Route::get('/produk/{product:slug}', [\App\Http\Controllers\Frontend\HomepageController::class, 'detail'])->name('detail');
Route::get('/kategori/{category:slug}', [\App\Http\Controllers\Frontend\HomepageController::class, 'kategori'])->name('kategori');
Route::post('/checkout', [\App\Http\Controllers\Frontend\HomepageController::class, 'checkout'])->name('checkout');

