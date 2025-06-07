<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportFollowUpController;


Route::get('/', function () {
    return view('landing');
})->name('landing');

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/login/admin', [SessionController::class, 'createAdmin'])->name('login.admin');
    Route::post('/login/admin', [SessionController::class, 'storeAdmin']);
    Route::get('/login/user', [SessionController::class, 'createUser'])->name('login.user');
    Route::post('/login/user', [SessionController::class, 'storeUser']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/facilities', [FacilityController::class, 'index'])->name('facilities.index');
    Route::get('/admin/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
    Route::post('/admin/facilities/create', [FacilityController::class, 'store'])->name('facilities.store');
    Route::get('/admin/facilities/edit/{id}', [FacilityController::class, 'edit'])->name('facilities.edit');
    Route::put('/admin/facilities/edit/{id}', [FacilityController::class, 'update'])->name('facilities.update');
    Route::delete('/admin/facilities/{id}', [FacilityController::class, 'destroy'])->name('facilities.destroy');

    Route::get('/admin/facility/qr-code/download/{id}', [FacilityController::class, 'downloadQRCode'])->name('facilities.qr-code');

    // Admin - Manajemen Laporan Lanjut
    Route::prefix('admin/reports')->name('followUp.')->group(function () {
        Route::get('/', [ReportFollowUpController::class, 'index'])->name('index');
        Route::get('/create', [ReportFollowUpController::class, 'create'])->name('create');
        Route::post('/', [ReportFollowUpController::class, 'store'])->name('store');
        Route::get('/{report}', [ReportFollowUpController::class, 'show'])->name('show');
        Route::get('/{report}/edit', [ReportFollowUpController::class, 'edit'])->name('edit');
        Route::put('/{report}', [ReportFollowUpController::class, 'update'])->name('update');
        Route::delete('/{report}', [ReportFollowUpController::class, 'destroy'])->name('destroy');
        Route::put('/{report}/update-status', [ReportFollowUpController::class, 'updateStatus'])->name('updateStatus');
        });
});

// User
Route::middleware(['auth', 'role:user'])->group(function () {
    // Implementasi route user here
    Route::resource('reports', ReportController::class); // Resource route untuk laporan

    Route::get('/scan', function () {
        return 'Fitur Scan QR Fasilitas sedang dikembangkan.';
    })->name('scan.qr');
});