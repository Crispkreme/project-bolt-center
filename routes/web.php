<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

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

// ADMIN PAGE
Route::get('/admin/dashboard', function () { return view('pages.admin.dashboard');})->name('admin.dashboard');
Route::get('/admin/product/list', function () { return view('pages.admin.products.product-list');})->name('admin.product.list');
Route::get('/admin/product/add', function () { return view('pages.admin.products.add-product');})->name('admin.product.add');

Route::get('/admin/stock/low', function () { return view('pages.admin.stocks.stock-low');})->name('admin.stock.low');
Route::get('/admin/stock/list', function () { return view('pages.admin.stocks.stock-list');})->name('admin.stock.list');

// Unit
Route::get('/admin/unit/list', [UnitController::class, 'unitList'])->name('admin.unit.list');
Route::post('/admin/unit/store', [UnitController::class, 'unitStore'])->name('admin.unit.store');

// Category
Route::get('/admin/category/list', [CategoryController::class, 'categoryList'])->name('admin.category.list');
Route::post('/admin/category/store', [CategoryController::class, 'categoryStore'])->name('admin.category.store');

require __DIR__.'/auth.php';
