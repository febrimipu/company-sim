<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderPendingController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Quotation\QuotationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Product\ProductImportController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 // Route Products
Route::resource('/products', ProductController::class);
Route::get('products/import', [ProductController::class, 'create'])->name('products.import.view');
Route::post('products/import/', [ProductImportController::class, 'store'])->name('products.export.store');



 // Route Orders
Route::resource('/orders', OrderController::class);

Route::get('/orders/completed', [OrderController::class, 'index'])->name('orders.complete');
Route::get('/orders/pending', [OrderPendingController::class, 'index'])->name('orders.pending');

 // Route Purchases
Route::resource('/purchases', PurchaseController::class);

Route::get('/purchases/approved', [PurchaseController::class, 'approvedPurchases'])->name('purchases.approvedPurchases');
Route::get('/purchases/report', [PurchaseController::class, 'approvedPurchases'])->name('purchases.purchaseReport');

Route::resource('/quotations', QuotationController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/customers', CustomerController::class);
Route::resource('/categories',CategoryController::class);
Route::resource('/units', UnitController::class);


require __DIR__.'/auth.php';