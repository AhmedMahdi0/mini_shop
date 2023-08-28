<?php

use Illuminate\Support\Facades\Route;
use UserModule\Http\Controllers\web\UserController;
use UserModule\Http\Middleware\Admin;


Route::middleware(['auth', Admin::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/create', [UserController::class, 'store']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/edit/{id}', [UserController::class, 'update']);
}
);
