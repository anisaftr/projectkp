<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Admin\LaporanController;

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

Route::middleware(['isPengguna'])->group(function () {
    Route::post('/store', [UserController::class, 'storePeminjaman'])->name('pekat.store');
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');

});

Route::middleware(['guest'])->group(function () {
    //login
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

    //register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
});



    Route::middleware(['isAdmin'])->group(function() {

        //petugas
        Route::resource('petugas', PeminjamanController::class);
        
        //user
        Route::resource('pengguna', PenggunaController::class);
        
        //laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });


    
    // Route::middleware(['isPetugas'])->group(function() {
    //     //dashboard
    //     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        
    //     //peminjaman
    //     Route::resource('peminjaman', PeminjamanController::class);
        
    //     //tanggapan
    //     Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
        
    //     //logout
    //     Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // });

    // Route::middleware(['isGuest'])->group(function() {
    //     Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
    //     Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    // });
