<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardadmController;
use App\Http\Controllers\DetailmobilownController;
use App\Http\Controllers\DetailmobilpelController;
use App\Http\Controllers\TambahmobilownController;
use App\Http\Controllers\DashboardownController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\DashboardpelController;
use App\Http\Controllers\PenyewaanController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login/penyewa', [LoginController::class, 'indexPenyewa']);
Route::post('auth/login/penyewa', [LoginController::class, 'loginPenyewa'])->name('login.penyewa');
Route::get('/register/penyewa', [RegisterController::class, 'indexPenyewa']);
Route::post('/register/penyewa', [RegisterController::class, 'registerPenyewa'])->name('register.penyewa');

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


//route tambah mobil owner
Route::get('/tambahmobilown', [TambahmobilownController::class, 'index'])->name('tambahmobilown.index');
Route::post('/tambahmobilown', [TambahmobilownController::class, 'store'])->name('tambahmobilown.store');
Route::get('/tambahmobilown/create', [TambahmobilownController::class, 'create'])->name('tambahmobilown.create');
Route::delete('/tambahmobilown/{mobil}', [TambahmobilownController::class, 'destroy'])->name('tambahmobilown.destroy');
Route::get('/tambahmobilown/{mobil}/edit', [TambahmobilownController::class, 'edit'])->name('tambahmobilown.edit');
Route::put('/tambahmobilown/{mobil}', [TambahmobilownController::class, 'update'])->name('tambahmobilown.update');


Route::get('/dashboardown', [DashboardownController::class, 'index'])->name('dashboardown.index');


Route::get('/detailmobilown', [DetailmobilownController::class, 'index'])->name('detailmobilown.index');
Route::get('/detailmobilown/{id}', [DetailmobilownController::class, 'index'])->name('detailmobilown.index');


Route::get('/detailmobilpel', [DetailmobilpelController::class, 'index'])->name('detailmobilpel.index');
Route::get('/detailmobilpel/{id}', [DetailmobilpelController::class, 'index'])->name('detailmobilpel.index');

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/dashboardpel', [DashboardpelController::class, 'index'])->name('dashboardpel.index');

    Route::get('/penyewaan/{id_mobil}', [PenyewaanController::class, 'create'])->name('penyewaan.create');
    Route::get('/delete/penyewaan/{id_penyewaan}', [PenyewaanController::class, 'destroy'])->name('penyewaan.destroy');
    Route::post('/update/penyewaan/{id_penyewaan}', [PenyewaanController::class, 'update'])->name('penyewaan.update');
    Route::post('/penyewaan/{id_mobil}', [PenyewaanController::class, 'store'])->name('penyewaan.store');
    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.list');
    Route::get('/penyewaan/saya/{id_penyewaan}', [PenyewaanController::class, 'detail'])->name('penyewaan.detail');

    Route::get('/invoice/{id_penyewaan}', [PenyewaanController::class, 'invoice'])->name('invoice.index');
});