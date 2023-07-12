<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/user', [UserController::class,'index']);

Route::get('/edit/{id}', [UserController::class,'edit']);
Route::post('/edit/{id}', [UserController::class,'update']);


Route::get('/create', [UserController::class,'create']);
Route::post('/create', [UserController::class,'store']);

Route::get('/delete/{id}', [UserController::class,'destroy']);