<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    
    // ADMIN PAGE
    Route::get('/dashboard', function () { return view('pages.admin.dashboard');})->name('dashboard');
    Route::get('/product/add', function () { return view('pages.admin.products.add-product');})->name('product.add');
    Route::get('/stock/low', function () { return view('pages.admin.stocks.stock-low');})->name('stock.low');
    Route::get('/stock/list', function () { return view('pages.admin.stocks.stock-list');})->name('stock.list');

    // Unit
    Route::get('/unit/list', [UnitController::class, 'unitList'])->name('unit.list');
    Route::post('/unit/store', [UnitController::class, 'unitStore'])->name('unit.store');

    // Category
    Route::get('/category/list', [CategoryController::class, 'categoryList'])->name('category.list');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    // sub category
    Route::get('/sub/category/list', [CategoryController::class, 'subCategoryList'])->name('sub.category.list');
    Route::post('/sub/category/store', [CategoryController::class, 'subCategoryStore'])->name('sub.category.store');
    Route::get('/sub/category/{id}/edit', [CategoryController::class, 'subCategoryEdit'])->name('sub.category.edit');
    Route::post('/sub/category/update', [CategoryController::class, 'subCategoryUpdate'])->name('sub.category.update');
    Route::delete('/sub/category/delete/{id}', [CategoryController::class, 'subCategoryDelete'])->name('category.delete');

    // PRODUCTS
    Route::get('/product/list', [ProductController::class, 'getProductList'])->name('product.list');
    Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');

    // COMPANY
    Route::get('/company/list', [CompanyController::class, 'companyList'])->name('company.list');
    Route::post('/company/store', [CompanyController::class, 'companyStore'])->name('company.store');
    Route::delete('/company/delete/{id}', [CompanyController::class, 'companyDelete'])->name('company.delete');
});