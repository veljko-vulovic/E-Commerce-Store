<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', HomeController::class)->name('home');
Route::get('/test', fn () => view('welcome'))->name('welcome');


Route::get('/dashboard', function () {
    $orders = Order::with(['user'])->where('user_id', Auth::user()->id)->orderBy('created_at')->get();
    $order = $orders->first();

    return view('admin.dashboard', compact('orders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/webhook', [CheckoutController::class, 'webhook'])->name('webhook');

Route::prefix('dashboard')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::patch('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::resource('category', CategoryController::class);
    Route::resource('order', OrderController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/add/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');



    // Payment
    Route::post('/cart/{cart}/checkout', [CheckoutController::class, 'checkout'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
});

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

require __DIR__ . '/auth.php';
