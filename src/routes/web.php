<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Cart\ShowCart;
use App\Livewire\Product\ListProducts;
use App\Livewire\Product\ShowProduct;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'auth.', 'middleware' => ['guest'], 'prefix' => 'auth'], function () {
    Route::get('register', Register::class)->name('register');
    Route::get('login', Login::class)->name('login');
});

Route::group(['as' => 'products.'], function () {
    Route::get('/', ListProducts::class)->name('list');
    Route::get('products/{productId}/show', ShowProduct::class)->name('show');
});

Route::get('cart', ShowCart::class)->name('cart.show');
