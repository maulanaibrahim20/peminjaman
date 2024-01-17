<?php

use App\Http\Auth\Controllers\RegisterController;
use App\Http\Controllers\SuperAdmin\User\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!re
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LandingController::class, 'index']);

    Route::prefix('login')->group(function () {
        Route::get('/', [LoginController::class, 'index']);
        Route::post('/', [LoginController::class, 'login'])->name('login');
    });

    Route::prefix('register')->group(function () {
        Route::get('/', [RegisterController::class, 'index']);
        Route::post('/', [RegisterController::class, 'register'])->name('register');
    });

    Route::prefix('reset-password')->name('reset-password.')->group(function () {
        Route::get('/', [ResetPasswordController::class, 'index']);
        Route::post('/', [ResetPasswordController::class, 'process'])->name('process');
    });

    Route::prefix('new-password')->name('new-password.')->group(function () {
        Route::get('/', [NewPasswordController::class, 'index']);
        Route::post('/', [NewPasswordController::class, 'process'])->name('process');
    });

    Route::get('verification', VerificationController::class)
        ->name('verification');
});


Route::group(['middleware' => ['autentikasi']], function () {

    Route::group(['middleware' => ['can:superadmin']], function () {
        Route::prefix('superadmin')->group(function () {
            Route::get('dashboard', [AppController::class, 'superadmin']);
            Route::resource('create/admin', AdminController::class);
        });
    });
    Route::group(['middleware' => ['can:admin']], function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [AppController::class, 'admin']);
        });
    });
    Route::group(['middleware' => ['can:mahasiswa']], function () {
        Route::prefix('mahasiswa')->group(function () {
            Route::get('dashboard', [AppController::class, 'mahasiswa']);
        });
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});
