<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Enums\TokenAbility;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [LoginController::class, 'create']);
Route::post('/register', [LoginController::class, 'store']);

Route::post('/forget-password', [LoginController::class, 'rest']);


Route::post('/refresh-token', [LoginController::class, 'refresh'])
    ->middleware(['ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value, 'auth:sanctum']);


Route::middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value])->group(function () {

    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/user', function (Request $request) {
        return [
            "id" => $request->user()->id,
            "username" => $request->user()->username,
            "email" => $request->user()->email,
            "first_name" => $request->user()->first_name,
            "last_name" => $request->user()->last_name,
            "is_admin" => $request->user()->is_admin,
            "is_active" => $request->user()->is_active,
        ];
    });
});
