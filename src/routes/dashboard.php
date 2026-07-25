<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Enums\UserType;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth:sanctum', 'check.user.type:' . UserType::ADMIN->value]], function () {
    Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
});
