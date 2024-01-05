<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('index');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    // Menambahkan route untuk halaman buku
    Route::get('/books', [DashboardController::class, 'show']);
    Route::get('/video', [DashboardController::class, 'video']);
    Route::get('/keanggotaan', [DashboardController::class, 'keanggotaan']);
    Route::get('/peminjam', [DashboardController::class, 'peminjam']);
    Route::get('/pelaporan', [DashboardController::class, 'pelaporan']);
    Route::get('/tambahbuku', [DashboardController::class, 'tambahbuku']);
    Route::get('/tambahvideo', [DashboardController::class, 'tambahvideo']);
    Route::get('/editbuku/{id}', [DashboardController::class, 'editbuku']);
    Route::get('/editvideo', [DashboardController::class, 'editvideo']);
    Route::get('/tambahpeminjaman', [DashboardController::class, 'tambahpeminjaman']);
    Route::get('/editpinjaman', [DashboardController::class, 'editpinjaman']);
    Route::get('/get-chart-data', [DashboardController::class, 'getDataChartAdmin'])->name('getChartData');
});

Route::group(['prefix' => 'users', 'as' => 'users', 'middleware' => 'auth'], function () {
    Route::get('/beranda', [UserController::class,'index'])->name('index');

    // Menambahkan route untuk halaman buku
    Route::get('/video', [UserController::class, 'video']);
    Route::get('/buku', [UserController::class, 'buku']);
    Route::get('/riwayat', [UserController::class, 'riwayat']);
    Route::get('/profil', [UserController::class, 'profil']);
    Route::get('/keranjang', [UserController::class, 'keranjang']);
    Route::get('/detailbuku/{id}', [UserController::class, 'detailbuku']);
});
