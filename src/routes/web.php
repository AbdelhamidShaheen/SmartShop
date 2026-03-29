<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\ListProducts;
use App\Livewire\ShowCart;
use App\Livewire\ShowProduct;
use Illuminate\Support\Facades\Route;


Route::group(["as" => "auth.", "prefix" => "auth"], function () {
    Route::get('register', Register::class)->name("register");
    Route::get('login', Login::class)->name("login");
});

Route::group(["as" => "products.", "prefix" => "products"], function () {
    Route::get('/', ListProducts::class)->name("list");
    Route::get('/{productId}/show', ShowProduct::class)->name("show");
});

Route::get('cart', ShowCart::class)->name("cart.show");
