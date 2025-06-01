<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
})->name('landing');

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/login/admin', [SessionController::class, 'createAdmin'])->name('login.admin');
    Route::get('/login/user', [SessionController::class, 'createUser'])->name('login.user');

    Route::post('/login/admin', [SessionController::class, 'storeAdmin'])->name('login.admin');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');
});

// User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/scan', function () {
        return 'Fitur Scan QR Fasilitas sedang dikembangkan.';
    })->name('scan.qr');
});