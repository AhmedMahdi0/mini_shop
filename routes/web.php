<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\VendorsController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\InventoryController;
use App\Http\Controllers\dashboard\ItemController;
use App\Http\Controllers\dashboard\InventoryItemController;
use App\Http\Controllers\dashboard\AddressController;
use App\Http\Controllers\dashboard\PurchaseOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\dashboard\VendorInventoryController;
use App\Http\Controllers\dashboard\VendorItemController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\EmailController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(Admin::class)->group(
    function () {
        Route::group(['users'], function () {
            Route::get('/users', [UserController::class, 'index'])->name('users');
            Route::get('/delete/{id}', [UserController::class, 'destroy']);
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/create', [UserController::class, 'store']);
            Route::get('/edit/{id}', [UserController::class, 'edit']);
            Route::post('/edit/{id}', [UserController::class, 'update']);

        }
        );
        Route::prefix('/vendors')->group(function () {
            Route::get('/', [VendorsController::class, 'index'])->name('vendors');
            Route::get('/create', [VendorsController::class, 'create']);
            Route::post('/create', [VendorsController::class, 'store']);
            Route::get('/delete/{id}', [VendorsController::class, 'destroy']);
            Route::get('/edit/{id}', [VendorsController::class, 'edit']);
            Route::post('/edit/{id}', [VendorsController::class, 'update']);
        });

        Route::prefix('/address')->group(function () {
            Route::get('/{type}/update/{id}', [AddressController::class, 'edit']);
            Route::post('/{type}/update/{id}', [AddressController::class, 'update']);
        });

        Route::prefix('/brands')->group(function () {
            Route::get('/', [BrandController::class, 'index']);
            Route::get('/create', [BrandController::class, 'create']);
            Route::post('/create', [BrandController::class, 'store']);
            Route::get('/delete/{id}', [BrandController::class, 'destroy']);
            Route::get('/edit/{id}', [BrandController::class, 'edit']);
            Route::post('/edit/{id}', [BrandController::class, 'update']);
        });

        Route::prefix('/items')->group(function () {
            Route::get('/', [ItemController::class, 'index']);
            Route::get('/create', [ItemController::class, 'create']);
            Route::post('/create', [ItemController::class, 'store']);
            Route::get('/delete/{id}', [ItemController::class, 'destroy']);
            Route::get('/edit/{id}', [ItemController::class, 'edit']);
            Route::post('/edit/{id}', [ItemController::class, 'update']);
        });
        Route::prefix('/inventory')->group(function () {
            Route::get('/add/vendor/{id}', [VendorInventoryController::class, 'create']);
            Route::post('/add/vendor/{id}', [VendorInventoryController::class, 'store']);
            Route::post('/add/vendor/delete/{id}', [VendorInventoryController::class, 'destroy']);

            Route::get('/add/item/{id}', [InventoryItemController::class, 'create']);
            Route::post('/add/item/{id}', [InventoryItemController::class, 'store']);
            Route::get('/item/delete/{id}/{item_id}', [InventoryItemController::class, 'destroy']);

            Route::get('/show/vendor/{id}', [VendorInventoryController::class, 'show']);
            Route::get('/show/items/{id}', [InventoryItemController::class, 'show']);


        });
        Route::prefix('/items')->group(function () {
            Route::get('/add/vendor/{id}', [VendorItemController::class, 'index']);
            Route::post('/add/vendor/{id}', [VendorItemController::class, 'store']);
        });

        Route::prefix('/inventory')->group(function () {
            Route::get('/', [InventoryController::class, 'index']);
            Route::get('/create', [InventoryController::class, 'create']);
            Route::post('/create', [InventoryController::class, 'store']);
            Route::get('/delete/{id}', [InventoryController::class, 'destroy']);
            Route::get('/edit/{id}', [InventoryController::class, 'edit']);
            Route::post('/edit/{id}', [InventoryController::class, 'update']);
            Route::get('/add', [InventoryController::class, 'show']);
        });
        Route::prefix("/email")->group(function () {
            Route::get('/send', [EmailController::class, 'index']);
            Route::post('/send', [EmailController::class, 'store']);
        });
    });
Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'create']);
    Route::get('/{id}', [CartController::class, 'destroy']);


});
Route::prefix('/order')->group(function () {
    Route::get('/list/{id}', [PurchaseOrderController::class, 'index']);
    Route::post('/list/{id}', [PurchaseOrderController::class, 'store']);
});

require __DIR__ . '/auth.php';
