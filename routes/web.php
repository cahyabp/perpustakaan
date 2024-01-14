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
    Route::post('/createbook', [DashboardController::class, 'createBook'])->name('createBook');
    Route::get('/tambahvideo', [DashboardController::class, 'tambahvideo']);
    Route::post('/tambahvideo', [DashboardController::class, 'createVideo'])->name('createVideo');
    Route::get('/editbuku/{id}', [DashboardController::class, 'editbuku']);
    Route::put('/editbuku/{id}', [DashboardController::class, 'editBook'])->name('editBook');
    Route::get('/editvideo/{id}', [DashboardController::class, 'editvideo']);
    Route::put('/editvideo/{id}', [DashboardController::class, 'edit_video'])->name('editVideo');
    Route::get('/tambahpeminjaman', [DashboardController::class, 'tambahpeminjaman']);
    Route::get('/editpinjaman/{id}', [DashboardController::class, 'editpinjaman']);
    Route::post('/editpinjaman/{id}', [DashboardController::class, 'updatePinjaman'])->name('updatePinjaman');
    Route::post('/export-pinjaman', [DashboardController::class, 'generatePDFPinjaman'])->name('exportPinjaman');
    Route::get('/get-chart-data', [DashboardController::class, 'getDataChartAdmin'])->name('getChartData');
    Route::get('/search-book', [DashboardController::class, 'searchBook'])->name('searchBook');
    Route::get('/search-video', [DashboardController::class, 'searchVideo'])->name('searchVideo');
    Route::get('/search-peminjam', [DashboardController::class, 'searchPeminjam'])->name('searchPeminjam');
    Route::get('/search-user', [DashboardController::class, 'searchUser'])->name('searchUser');
});

Route::group(['prefix' => 'users', 'as' => 'users', 'middleware' => 'auth'], function () {
    Route::get('/beranda', [UserController::class,'index'])->name('index');

    // Menambahkan route untuk halaman buku
    Route::get('/video', [UserController::class, 'video']);
    Route::get('/buku', [UserController::class, 'buku']);
    Route::get('/riwayat', [UserController::class, 'riwayat']);
    Route::get('/profil', [UserController::class, 'profil']);
    Route::post('/profil', [UserController::class, 'updateProfil'])->name('updateProfile');
    Route::get('/keranjang', [UserController::class, 'keranjang']);
    Route::get('/detailbuku/{id}', [UserController::class, 'detailbuku']);

    Route::get('/pinjam-buku/{id}', [UserController::class, 'pinjamBuku'])->name('pinjamBuku');
    Route::post('/tambah-ke-keranjang/{id}', [UserController::class, 'addBookToCart'])->name('addBookToCart');
    Route::post('/remove-cart/{id}', [UserController::class, 'removeBookFromCart'])->name('removeBookFromCart');
    Route::get('/pesan-buku', [UserController::class, 'checkout'])->name('checkout');
    Route::get('/search-book', [UserController::class, 'searchBook'])->name('searchBook');
    Route::get('/search-video', [UserController::class, 'searchVideo'])->name('searchVideo');
    Route::get('/search-riwayat', [UserController::class, 'searchRiwayat'])->name('searchRiwayat');

});
