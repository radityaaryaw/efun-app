<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OfficerController;

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
Route::middleware(['isGuest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
});
Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/store', [AuthController::class, 'regisakun'])->name('regisakun');

Route::middleware(['isAdmin', 'isLogin'])->group(function () {
    Route::get('/dashboard/admin', [AuthController::class, 'admin'])->name('admin.dash');

    // User Menu Route --------------------------------------------------------------------------------------------
    Route::get('/dashboard/admin/user', [AdminController::class, 'index'])->name('user.index');
    Route::get('/dashboard/admin/user/add', [AdminController::class, 'create'])->name('user.create');
    Route::delete('/dashboard/admin/delete/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::post('/dashboard/admin/add', [AdminController::class, 'store'])->name('user.store');
    Route::put('/dashboard/admin/userupdate/{id}', [AdminController::class, 'update'])->name('user.update');
    Route::post('/dashboard/admin/user/export-excel', [AdminController::class, 'userExcel'])->name('exportuser');


    // Category Menu Route ----------------------------------------------------------------------------------------
    Route::get('/dashboard/admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/dashboard/admin/category/add', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/dashboard/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/dashboard/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/dashboard/admin/category/export-excel', [CategoryController::class, 'categoryExcel'])->name('exportcategory');

    // Pengajuan Menu Route --------------------------------------------------------------------------------------------
    Route::get('/dashboard/admin/pengajuan', [BookController::class, 'index'])->name('book.index');
    Route::get('/dashboard/admin/pengajuan/add', [BookController::class, 'create'])->name('book.create');
    Route::post('/dashboard/admin/createpengajuan', [BookController::class, 'store'])->name('book.store');
    // Route::put('/dashboard/admin/pengajuan/update/{id}', [BookController::class, 'update'])->name('book.update');
    // Route::delete('/dashboard/admin/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    // Route::post('/dashboard/admin/book/export-excel', [BookController::class, 'bookExcel'])->name('exportbook');

    Route::get('/dashboard/admin/event', [LibraryController::class, 'pinjam'])->name('lending');
});

Route::middleware(['isUser'])->group(function () {
    Route::get('/dashboard/user', [AuthController::class, 'user'])->name('user.dash');
    Route::get('/dashboard/user/tiketevent', [LibraryController::class, 'borrow'])->name('tiketevent');
    // Route::post('/dashboard/user/book/borrowed/export-excel', [LibraryController::class, 'lendingExcel'])->name('lendingExcel');
});

Route::middleware(['isOfficer'])->group(function () {
    Route::get('/dashboard/penyelenggara', [AuthController::class, 'officer'])->name('officer.dash');

    // Book Menu Route --------------------------------------------------------------------------------------------
    Route::get('/dashboard/penyelenggara/pengajuan', [OfficerController::class, 'bookindex'])->name('officerbook');
    Route::get('/dashboard/penyelenggara/pengajuan/add', [OfficerController::class, 'bookcreate'])->name('bookcreate');
    Route::post('/dashboard/penyelenggara/createpengajuan', [OfficerController::class, 'bookstore'])->name('bookstore');
    Route::put('/dashboard/penyelenggara/pengajuan/update/{id}', [OfficerController::class, 'bookupdate'])->name('bookupdate');
    Route::delete('/dashboard/penyelenggara/pengajuan/delete/{id}', [OfficerController::class, 'bookdestroy'])->name('bookdestroy');
    Route::post('/dashboard/penyelenggara/book/export-excel', [OfficerController::class, 'booksExcel'])->name('exportbooks');

    Route::get('/dashboard/penyelenggara/validasi', [LibraryController::class, 'officerborrow'])->name('officerborrow');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




