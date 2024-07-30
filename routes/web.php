<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeAdministratorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductAddController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductUpdateController;
use App\Http\Controllers\ProductView;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

    // Rute Home
   Route::get("/", [HomeController::class,"index"])->name("home");
   Route::get("/search_all", [SearchController::class,"search"])->name("search_all");

    Route::prefix("kategori")->group(function () {
        Route::get("/", [HomeController::class, 'index'])->name('kategori.index');
        Route::get('/iem', [HomeController::class,'iemview'])->name('home.iem');
        Route::get('/cable', [HomeController::class,'cableview'])->name('home.cable');
        Route::get('/eartips', [HomeController::class,'eartipsview'])->name('home.eartips');
        Route::get('/box', [HomeController::class,'boxview'])->name('home.box');
    });

    // USER
        // Route apa saja yang bisa dilakukan guest sebelum login
            Route::prefix('guest')->group(function () {
             Route::get("/wishlist", [WishlistController::class, "index"])->name("wishlist");
             Route::get('/cart', [CartController::class,'showCart'])->name('cart');
             Route::get('/product_detail/{product_id}' , [ProductView::class, 'index'])->name('product-detail');
            });

        // Route yang harus dilakukan user bukan lagi guest
            Route::prefix("UserAction")->group( function(){
                Route::post('/home/addcart/{product_id}', [HomeController::class,'savecart'])->name('savecart');
                Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
                Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
                Route::post('cart/update/decrease/{product_id}', [CartController::class , 'decreaseQuantity'])->name('cart.decrease.quantity');
                Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
                Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
                Route::post('/checkout-action', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
                Route::post('/endtransaction', [TransactionController::class, 'endCheckout'])->name('checkoutend');
                Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
                Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
                Route::delete('/wishlist/{product_id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
            });

        // Rute User khusus edit profile
            Route::prefix('profile')->group(function () {
                Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::get('/user-profile/{user_id}', [ProfileController::class,'edit'])->name('user-profile');
                Route::put('/user-profile/{user_id}', [ProfileController::class,'update'])->name('user-update');
                Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
                Route::post('/logout', [ProfileController::class, 'logout'])->name('profile.logout');
        });

    // Rute Administrator
        Route::prefix('administrator')->middleware('auth')->group(function () {
            Route::get('/', [HomeAdministratorController::class, 'index'])->name('administrator-home');
            Route::prefix('product')->group(function () {
                Route::get('/', [ProductAdminController::class, 'showAdmin'])->name('product-table');
                Route::get('/add', [ProductAddController::class, 'index'])->name('product-add');
                Route::post('/', [ProductAddController::class, 'store'])->name('product-store');
                Route::delete('/{product_id}', [ProductUpdateController::class, 'destroy'])->name('product-destroy');
                Route::get('/{product_id}', [ProductUpdateController::class, 'show'])->name('product-edit');
                Route::put('/{product_id}', [ProductUpdateController::class, 'update'])->name('product-update');
            });
        });

// Autentikasi rute
require __DIR__.'/auth.php';