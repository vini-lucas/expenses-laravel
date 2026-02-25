<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentDeadlineController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'login'])->name('login.login');

Route::resources([
    'users' => UserController::class,
    'expenses' => ExpenseController::class,
    'cards' => CardController::class,
    'categories' => CategoryController::class,
]);

Route::resource('payments_deadline', PaymentDeadlineController::class)
    ->parameters([
        'payments_deadline' => 'payment_deadline'
    ]);
    Route::resource('payment_methods', PaymentMethodController::class)
    ->parameters([
        'payment_methods' => 'payment_method'
    ]);
