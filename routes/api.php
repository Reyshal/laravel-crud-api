<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{slug}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::delete('/{slug}', [ProductController::class, 'destroy']);
});
