<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardownController;
use App\Http\Controllers\DashboardadmController;
use App\Http\Controllers\LoginController;
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
Route::get('/dashboardown', [DashboardownController::class, 'index']);
// Route::get('/pmmobil', [pmmobilController::class, 'index'])->name('pmmobil.index');
Route::get('/dashboardadm', [DashboardadmController::class, 'index']);
Route::get('/dashboard', [DashboardownController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
// Route::get('/pmmobil', [pmmobilController::class, 'index'])->name('pmmobil.index');

Route::get('/admin/users', [DashboardadmController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [DashboardadmController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [DashboardadmController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [DashboardadmController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [DashboardadmController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [DashboardadmController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/users/{user}', [DashboardadmController::class, 'show'])->name('admin.users.show');
