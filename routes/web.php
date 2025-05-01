<?php

use Illuminate\Support\Facades\Route;

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
// routes/web.php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// web.php
Route::get('/invoice/pdf/{invoice}', [DashboardController::class, 'downloadPDF'])->name('dashboard.invoice.pdf');
Route::get('/invoice/email/{invoice}', [DashboardController::class, 'sendEmail'])->name('dashboard.invoice.email');

    Route::prefix('dashboard/invoice')->name('dashboard.invoice.')->group(function () {
        Route::get('create', [DashboardController::class, 'create'])->name('create');
        Route::post('create', [DashboardController::class, 'store'])->name('store');
        Route::get('edit/{invoice}', [DashboardController::class, 'edit'])->name('edit');
        Route::put('update/{invoice}', [DashboardController::class, 'update'])->name('update');
        Route::delete('delete/{invoice}', [DashboardController::class, 'destroy'])->name('destroy');
    });
});
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware('auth')->group(function () {
    Route::resource('invoices', InvoiceController::class)->except(['show']);
});
Route::get('/', function () {
    return view('welcome');
});
