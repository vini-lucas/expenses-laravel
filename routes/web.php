<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Todas as 7 rotas dos usuários
Route::resource('users', UserController::class);
