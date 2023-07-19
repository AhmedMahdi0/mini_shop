<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\VendorsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class , 'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(Admin::class)->group(
   function (){
       Route::get('/users', [UserController::class,'index'])->name('users');
       Route::get('/delete/{id}', [UserController::class,'destroy']);
       Route::get('/create', [UserController::class,'create']);
       Route::post('/create', [UserController::class,'store']);
       Route::get('/edit/{id}', [UserController::class,'edit']);
       Route::post('/edit/{id}', [UserController::class,'update']);



       Route::get('/vendors', [VendorsController::class,'index']);
       Route::get('/vendors/create', [VendorsController::class,'create']);
       Route::post('/vendors/create', [VendorsController::class,'store']);
       Route::get('/vendors/delete/{id}', [VendorsController::class,'destroy']);
       Route::get('/vendors/edit/{id}', [VendorsController::class,'edit']);
       Route::post('/vendors/edit/{id}', [VendorsController::class,'update']);
   }
);

require __DIR__.'/auth.php';
