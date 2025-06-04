<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    EventController,
    KategoriController,
    LandingController,
    PembelianController,
    TiketController,
    UserController
};
use App\Models\Pembelian;

Route::get('/', [LandingController::class, 'home'])->name('home');

// Guest (belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/events', [LandingController::class, 'event'])->name('event');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register/store', [AuthController::class, 'regisakun'])->name('regisakun');
    Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');
});
Route::middleware(['auth', 'role:Admin,Penyelenggara,User']) // pakai koma, bukan garis miring atau pipe
    ->group(function () {
        Route::get('/event/detail', [LandingController::class, 'detailevent'])->name('detailevent');
    });


// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:Admin'])
    ->prefix('dashboard/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AuthController::class, 'admin'])->name('dash');

        // User Management
        Route::resource('user', UserController::class);

        // Event (optional view only)
        Route::get('/event', [EventController::class, 'index'])->name('event.index');
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event/{event}/approve', [EventController::class, 'approve'])->name('event.approve');
        Route::post('/event/{event}/reject', [EventController::class, 'reject'])->name('event.reject');

        // Kategori
        Route::resource('category', KategoriController::class);

        // Tiket
        Route::resource('tiket', TiketController::class);
    });


// User
Route::middleware(['auth', 'role:User'])->prefix('dashboard/user')->name('user.')->group(function () {
    Route::get('/', [AuthController::class, 'user'])->name('dash');
    Route::resource('pembelian', PembelianController::class);
});

// Penyelenggara
Route::middleware(['auth', 'role:Penyelenggara'])->prefix('dashboard/penyelenggara')->name('penyelenggara.')->group(function () {
    Route::get('/', [AuthController::class, 'penyelenggara'])->name('dash');

    // Pembelian
    Route::resource('pembelian', PembelianController::class);

    // Aksi Persetujuan Pembelian
    Route::post('/pembelian/{id}/setuju', [PembelianController::class, 'setuju'])->name('pembelian.setuju');
    Route::post('/pembelian/{id}/tolak', [PembelianController::class, 'tolak'])->name('pembelian.tolak');

    // Ekspor & Cetak
    Route::get('/pembelian/cetak/{pembelian}', [PembelianController::class, 'cetakPembelian'])->name('pembelian.cetak');
    Route::get('/pembelian/cetak-all', [PembelianController::class, 'cetakAllPembelian'])->name('pembelian.cetak.all');
    Route::get('/pembelian/cetak-pdf', [PembelianController::class, 'cetakPdfPembelian'])->name('pembelian.cetak.pdf');
    Route::get('/pembelian/cetak-excel', [PembelianController::class, 'cetakExcelPembelian'])->name('pembelian.cetak.excel');
});
