<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardownController;
use App\Http\Controllers\DashboardadmController;

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