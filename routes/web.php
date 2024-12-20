<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () { return Inertia::render('Dashboard'); })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/change/password', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::get('/delete/account', [ProfileController::class, 'deleteAccount'])->name('delete.account');
    Route::post('/profile/create', [ProfileController::class, 'updateOrCreateProfile'])->name('profile.create');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Employee
    Route::get('/all/employee', [EmployeeController::class, 'index'])->name('all.employee');
    Route::get('/create/employee', [EmployeeController::class, 'createEmployee'])->name('create.employee');
    Route::post('/store/employee', [EmployeeController::class, 'updateOrCreateEmployee'])->name('store.employee');
});

require __DIR__.'/auth.php';
