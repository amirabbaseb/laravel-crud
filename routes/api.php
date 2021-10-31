<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;

Route::prefix('item')->group(function () {
    Route::get('/', [ItemsController::class, 'index']);
    Route::post('/create', [ItemsController::class, 'store']);
    Route::put('/update/{id}', [ItemsController::class, 'update']);
    Route::delete('/delete/{id}', [ItemsController::class, 'destroy']);
});

Route::prefix('brand')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::post('/create', [BrandController::class, 'store']);
    Route::put('/update/{id}', [BrandController::class, 'update']);
    Route::delete('/delete/{id}', [BrandController::class, 'destroy']);
});

Route::prefix('color')->group(function () {
    Route::get('/', [ColorController::class, 'index']);
    Route::post('/create', [ColorController::class, 'store']);
    Route::put('/update/{id}', [ColorController::class, 'update']);
    Route::delete('/delete/{id}', [ColorController::class, 'destroy']);
});
