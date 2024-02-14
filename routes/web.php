<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardownController;
use App\Http\Controllers\DashboardadmController;
=======
use App\Http\Controllers\LoginController;
>>>>>>> e42755fdd386f5d5288d3f0eeca16534bda2f995

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
<<<<<<< HEAD
Route::get('/dashboardown', [DashboardownController::class, 'index']);
// Route::get('/pmmobil', [pmmobilController::class, 'index'])->name('pmmobil.index');
Route::get('/dashboardadm', [DashboardadmController::class, 'index']);
=======
Route::get('/dashboard', [DashboardownController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
// Route::get('/pmmobil', [pmmobilController::class, 'index'])->name('pmmobil.index');
>>>>>>> e42755fdd386f5d5288d3f0eeca16534bda2f995
