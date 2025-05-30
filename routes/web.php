<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('reports', ReportController::class);
});

Route::get('/scan', function () {
    return 'Fitur Scan QR Fasilitas sedang dikembangkan.';
})->name('scan.qr');


