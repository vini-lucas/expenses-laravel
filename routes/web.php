<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resources([
    'users' => UserController::class,
    'expenses' => ExpenseController::class
]);
