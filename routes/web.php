<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');

Route::post('/store', [UserController::class, 'storePeminjaman'])->name('pekat.store');
Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');

Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');

Route::prefix('admin')->group(function() {

    Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('user', UserController::class);
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
