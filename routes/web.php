<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/404', function () { return view('404'); })->middleware(['auth', 'verified'])->name('404');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/employee/dashboard', function () { return view('pages.employee.dashboard');})->name('employee.dashboard');
});

Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/fetch/sub/category', [CategoryController::class, 'getSubCategoryList'])->name('fetch.sub.category');
Route::get('/fetch/category', [CategoryController::class, 'getCategoryList'])->name('fetch.category');
Route::get('/fetch/supplier', [EntityController::class, 'getSupplierList'])->name('fetch.supplier');
Route::get('/search/products', [ProductController::class, 'searchProducts']);

require __DIR__.'/auth.php';
