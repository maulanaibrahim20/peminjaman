<?php

use App\Http\Controllers\admin\ContentController;
use App\Http\Controllers\Admin\DataClientController;
use App\Http\Controllers\SuperAdmin\User\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\client\ClientBookingController;
use App\Http\Controllers\DataOwnerController;
use App\Http\Controllers\Owner\KatalogMakeupController;
use App\Http\Controllers\Owner\TypeMakeupController;
use App\Http\Controllers\RegisterController;

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
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::resource('/register', RegisterController::class);
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
