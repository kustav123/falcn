<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\Staffs;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<h1>welcome</h1>';
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->middleware('auth');

    Route::prefix('staffs')->group(function () {
        Route::get('/', [Staffs::class, 'index']);
        Route::post('store', [Staffs::class, 'store']);
        Route::post('edit', [Staffs::class, 'edit']);
        Route::post('delete', [Staffs::class, 'destroy']);
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [Clients::class, 'index']);
        Route::post('store', [Clients::class, 'store']);
        Route::post('edit', [Clients::class, 'edit']);
        Route::post('disable', [Clients::class,'disable']);
    });

    Route::prefix('suppliers')->group(function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('store', [SupplierController::class, 'store']);
        Route::post('edit', [SupplierController::class, 'edit']);
        Route::post('disable', [SupplierController::class,'disable']);
    });

    Route::prefix('items')->group(function () {
        Route::get('/', [ItemsController::class, 'index']);
        Route::post('store', [ItemsController::class, 'store']);
        Route::post('edit', [ItemsController::class, 'edit']);
        Route::post('disable', [ItemsController::class, 'disable']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
