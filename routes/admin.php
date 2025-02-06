<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UnitController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    
    // ADMIN PAGE
    Route::get('/dashboard', function () { return view('pages.admin.dashboard');})->name('dashboard');

    // STOCK
    Route::get('/stock/list', [StockController::class, 'stockList'])->name('stock.list');
    Route::get('/stock/low', [StockController::class, 'lowStockList'])->name('stock.low');
    Route::get('/stock/adjustment', [StockController::class, 'stockAdjustmentList'])->name('stock.adjustment');
    Route::post('/stock/add', [StockController::class, 'addStock'])->name('stock.add');

    // PRODUCT
    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
    Route::get('/product/list', [ProductController::class, 'getProductList'])->name('product.list');
    Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');
    Route::delete('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    Route::get('/product/{id}/edit', [ProductController::class, 'productEdit'])->name('product.edit');
    Route::post('/product/update', [ProductController::class, 'productUpdate'])->name('product.update');

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
    
    // COMPANY
    Route::get('/company/list', [CompanyController::class, 'companyList'])->name('company.list');
    Route::post('/company/store', [CompanyController::class, 'companyStore'])->name('company.store');
    Route::delete('/company/delete/{id}', [CompanyController::class, 'companyDelete'])->name('company.delete');
    Route::get('/company/{id}/edit', [CompanyController::class, 'companyEdit'])->name('company.edit');
    Route::post('/company/update', [CompanyController::class, 'companyUpdate'])->name('company.update');

    // ENTITY
    Route::get('/customer/list', [EntityController::class, 'getAllCustomer'])->name('customer.list');
    Route::get('/supplier/list', [EntityController::class, 'getSupplierSelect'])->name('supplier.list');
    Route::post('/entity/store', [EntityController::class, 'entityStore'])->name('entity.store');
    Route::get('/entity/{id}/edit', [EntityController::class, 'entityEdit'])->name('entity.edit');
    Route::post('/entity/update', [EntityController::class, 'entityUpdate'])->name('entity.update');

    // EXPENSES
    Route::get('/expenses/list', [ExpensesController::class, 'getAllExpenses'])->name('expenses.list');
    Route::post('/expenses/store', [ExpensesController::class, 'expensesStore'])->name('expenses.store');

    // EMPLOYEES
    Route::get('/employee/list', [EmployeeController::class, 'getAllEmployee'])->name('employee.list');
    Route::get('/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add');
    Route::post('/employee/store', [EmployeeController::class, 'storeEmployee'])->name('employee.store');
});