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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(Admin::class)->group(
    function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/delete/{id}', [UserController::class, 'destroy']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/edit/{id}', [UserController::class, 'update']);

    }
);
Route::middleware(Admin::class)->group(
    function () {
        Route::get('/vendors', [VendorsController::class, 'index'])->name('vendors');
        Route::get('/vendors/create', [VendorsController::class, 'create']);
        Route::post('/vendors/create', [VendorsController::class, 'store']);
        Route::get('/vendors/delete/{id}', [VendorsController::class, 'destroy']);
        Route::get('/vendors/edit/{id}', [VendorsController::class, 'edit']);
        Route::post('/vendors/edit/{id}', [VendorsController::class, 'update']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('address/{type}/update/{id}', [AddressController::class, 'edit']);
        Route::post('address/{type}/update/{id}', [AddressController::class, 'update']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('/brands', [BrandController::class, 'index']);
        Route::get('/brands/create', [BrandController::class, 'create']);
        Route::post('/brands/create', [BrandController::class, 'store']);
        Route::get('/brands/delete/{id}', [BrandController::class, 'destroy']);
        Route::get('/brands/edit/{id}', [BrandController::class, 'edit']);
        Route::post('/brands/edit/{id}', [BrandController::class, 'update']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('/items', [ItemController::class, 'index']);
        Route::get('/items/create', [ItemController::class, 'create']);
        Route::post('/items/create', [ItemController::class, 'store']);
        Route::get('/items/delete/{id}', [ItemController::class, 'destroy']);
        Route::get('/items/edit/{id}', [ItemController::class, 'edit']);
        Route::post('/items/edit/{id}', [ItemController::class, 'update']);
    });
Route::middleware(Admin::class)->group(
    function () {
        Route::get('inventory/add/vendor/{id}', [VendorInventoryController::class, 'create']);
        Route::post('inventory/add/vendor/{id}', [VendorInventoryController::class, 'store']);
        Route::post('inventory/add/vendor/delete/{id}', [VendorInventoryController::class, 'destroy']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('inventory/add/item/{id}', [InventoryItemController::class, 'create']);
        Route::post('inventory/add/item/{id}', [InventoryItemController::class, 'store']);
        Route::get('inventory/item/delete/{id}/{item_id}', [InventoryItemController::class, 'destroy']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('inventory/show/vendor/{id}', [VendorInventoryController::class, 'show']);
        Route::get('inventory/show/items/{id}', [InventoryItemController::class, 'show']);
    });
Route::middleware(Admin::class)->group(
    function () {
        Route::get('items/add/vendor/{id}', [VendorItemController::class, 'index']);
        Route::post('items/add/vendor/{id}', [VendorItemController::class, 'store']);
    });

Route::middleware(Admin::class)->group(
    function () {
        Route::get('/inventory', [InventoryController::class, 'index']);
        Route::get('/inventory/create', [InventoryController::class, 'create']);
        Route::post('/inventory/create', [InventoryController::class, 'store']);
        Route::get('/inventory/delete/{id}', [InventoryController::class, 'destroy']);
        Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit']);
        Route::post('/inventory/edit/{id}', [InventoryController::class, 'update']);
        Route::get('/inventory/add', [InventoryController::class, 'show']);
    });

Route::group(['cart'], function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'create']);
    Route::get('/cart/{id}', [CartController::class, 'destroy']);
});
Route::group(['cart'], function () {
    Route::get('/order/list/{id}', [PurchaseOrderController::class, 'index']);
    Route::post('/order/list/{id}', [PurchaseOrderController::class, 'store']);
});

require __DIR__ . '/auth.php';
