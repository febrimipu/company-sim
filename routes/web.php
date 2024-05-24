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


Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('/orders', OrderController::class);

Route::get('/orders/completed', [OrderController::class, 'index'])->name('orders.completed');
Route::get('/orders/pending', [OrderPendingController::class, 'index'])->name('orders.pending');

Route::resource('/purchases', PurchaseController::class);

Route::get('/purchases/approved', [PurchaseController::class, 'approvedPurchases'])->name('purchases.approvedPurchases');
Route::get('/purchases/report', [PurchaseController::class, 'approvedPurchases'])->name('purchases.purchaseReport');

Route::resource('/quotations', QuotationController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/customers', CustomerController::class);
Route::resource('/categories',CategoryController::class);


require __DIR__.'/auth.php';