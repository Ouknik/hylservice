<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\VendreController;
use App\Http\Controllers\RepriseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Acheter (Buy)
Route::get('/acheter', [CarController::class, 'index'])->name('acheter');
Route::get('/acheter/{car}', [CarController::class, 'show'])->name('acheter.show');

// Vendre (Sell)
Route::get('/vendre', [VendreController::class, 'create'])->name('vendre');
Route::post('/vendre', [VendreController::class, 'store'])->name('vendre.store');

// Reprise (Trade-in)
Route::get('/reprise', [RepriseController::class, 'create'])->name('reprise');
Route::post('/reprise', [RepriseController::class, 'store'])->name('reprise.store');

// Contact
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Static pages
Route::get('/services', function () { return view('services'); })->name('services');
Route::get('/faq', function () { return view('faq'); })->name('faq');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/authenticate', fn () => redirect()->route('admin.login'));

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::patch('/car/{car}/status', [AdminController::class, 'updateCarStatus'])->name('car.updateStatus');
    Route::delete('/car/{car}', [AdminController::class, 'destroyCar'])->name('car.destroy');
    Route::patch('/reprise/{reprise}/status', [AdminController::class, 'updateRepriseStatus'])->name('reprise.updateStatus');
    Route::patch('/contact/{contact}/status', [AdminController::class, 'updateContactStatus'])->name('contact.updateStatus');
});
