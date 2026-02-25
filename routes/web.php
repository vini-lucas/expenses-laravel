<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentDeadlineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resources([
    'users' => UserController::class,
    'expenses' => ExpenseController::class,
    'cards' => CardController::class,
    //'payments_deadline' => PaymentDeadlineController::class,
    'categories' => CategoryController::class
]);

Route::resource('payments_deadline', PaymentDeadlineController::class)
    ->parameters([
        'payments_deadline' => 'payment_deadline'
    ]);
