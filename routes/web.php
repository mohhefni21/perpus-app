<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'autentikasi']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('pinjam', BorrowingController::class);
    Route::prefix('borrowings')->name('borrowings.')->group(function () {
        Route::get('/', [BorrowingController::class, 'index'])->name('index');
        Route::get('/create', [BorrowingController::class, 'create'])->name('create');
        Route::post('/store', [BorrowingController::class, 'store'])->name('store');
        Route::get('/{borrowing}', [BorrowingController::class, 'show'])->name('show');
        Route::patch('/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('return');
    });
});
