<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardadmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MobilController;

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboardadm', [DashboardadmController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users/create', [DashboardadmController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [DashboardadmController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [DashboardadmController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [DashboardadmController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/{user}', [DashboardadmController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{user}/edit', [DashboardadmController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{username}', [DashboardadmController::class, 'update'])->name('admin.users.update');

});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil/store', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{no_polisi}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
Route::put('/mobil/{no_polisi}', [MobilController::class, 'update'])->name('mobil.update');
Route::delete('/mobil/{no_polisi}', [MobilController::class, 'destroy'])->name('mobil.destroy');