<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    EventController,
    KategoriController,
    LandingController,
    PembelianController,
    TiketController,
    UserController
};
use App\Models\Pembelian;

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/events', [LandingController::class, 'event'])->name('event');

// Guest (belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register/store', [AuthController::class, 'regisakun'])->name('regisakun');
    Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');
});

Route::middleware(['auth', 'role:Admin,Penyelenggara,User'])->group(function () {
    Route::get('/event/detail/{id}', [LandingController::class, 'detailevent'])->name('detailevent');
});

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:Admin'])->prefix('dashboard/admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('dash');

    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Event
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/{event}/approve', [EventController::class, 'approve'])->name('event.approve');
    Route::post('/event/{event}/reject', [EventController::class, 'reject'])->name('event.reject');

    // Kategori
    Route::get('/category', [KategoriController::class, 'index'])->name('category.index');
    Route::get('/category/create', [KategoriController::class, 'create'])->name('category.create');
    Route::post('/category', [KategoriController::class, 'store'])->name('category.store');
    Route::get('/category/{category}', [KategoriController::class, 'show'])->name('category.show');
    Route::get('/category/{category}/edit', [KategoriController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [KategoriController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [KategoriController::class, 'destroy'])->name('category.destroy');

    // Tiket
    Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
    Route::get('/tiket/create', [TiketController::class, 'create'])->name('tiket.create');
    Route::post('/tiket', [TiketController::class, 'store'])->name('tiket.store');
    Route::get('/tiket/{tiket}', [TiketController::class, 'show'])->name('tiket.show');
    Route::get('/tiket/{tiket}/edit', [TiketController::class, 'edit'])->name('tiket.edit');
    Route::put('/tiket/{tiket}', [TiketController::class, 'update'])->name('tiket.update');
    Route::delete('/tiket/{tiket}', [TiketController::class, 'destroy'])->name('tiket.destroy');
});

// User
Route::middleware(['auth', 'role:User'])->prefix('dashboard/user')->name('user.')->group(function () {
    Route::get('/', [DashboardController::class, 'user'])->name('dash');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/{pembelian}', [PembelianController::class, 'show'])->name('pembelian.show');
    Route::get('/pembelian/{pembelian}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::put('/pembelian/{pembelian}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/{pembelian}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
});

// Proses Pembelian Tiket
Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('store');

Route::middleware(['auth', 'role:Penyelenggara'])->prefix('dashboard/penyelenggara')->name('penyelenggara.')->group(function () {
    Route::get('/', [DashboardController::class, 'penyelenggara'])->name('dash');

    // Route Pembelian
    Route::prefix('pembelian')->name('pembelian.')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('index');
        Route::get('/create', [PembelianController::class, 'create'])->name('create');
        Route::post('/', [PembelianController::class, 'store'])->name('store');
        Route::get('/{pembelian}', [PembelianController::class, 'show'])->name('show');
        Route::get('/{pembelian}/edit', [PembelianController::class, 'edit'])->name('edit');
        Route::put('/{pembelian}', [PembelianController::class, 'update'])->name('update');
        Route::delete('/{pembelian}', [PembelianController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/setuju', [PembelianController::class, 'setuju'])->name('setuju');
        Route::post('/{id}/tolak', [PembelianController::class, 'tolak'])->name('tolak');
        Route::get('/cetak/{pembelian}', [PembelianController::class, 'cetakPembelian'])->name('cetak');
        Route::get('/cetak-all', [PembelianController::class, 'cetakAllPembelian'])->name('cetak.all');
        Route::get('/cetak-pdf', [PembelianController::class, 'cetakPdfPembelian'])->name('cetak.pdf');
        Route::get('/cetak-excel', [PembelianController::class, 'cetakExcelPembelian'])->name('cetak.excel');
    });

    // Route Event (Pengajuan Event)
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::get('/{event}', [EventController::class, 'show'])->name('show');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
    });
});
