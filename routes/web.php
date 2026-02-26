<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentDeadlineController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'loginProccess'])->name('login.proccess');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerProccess'])->name('register.proccess');
Route::get('/logoff', [LoginController::class, 'logoff'])->name('logoff');

// Precisa estar autenticado para acessá-las.
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'users' => UserController::class,
        'expenses' => ExpenseController::class,
        'cards' => CardController::class,
        'categories' => CategoryController::class,
        'installments' => InstallmentController::class
    ]);

    Route::resource('payments_deadline', PaymentDeadlineController::class)
        ->parameters([
            'payments_deadline' => 'payment_deadline'
        ]);
    Route::resource('payment_methods', PaymentMethodController::class)
        ->parameters([
            'payment_methods' => 'payment_method'
        ]);
});
