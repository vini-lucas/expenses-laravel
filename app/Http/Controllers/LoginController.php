<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $cpf = preg_replace('/\D/', '', $request->cpf); // Aceita somente números.
        try {
            $authenticated = Auth::attempt([
                'cpf' => $cpf,
                'password' => $request->password
            ]);

            if (!$authenticated) {
                return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
            } else {
                return redirect()->route('users.index')->with('success', 'Bem-vindo de volta!');
            }
        } catch (Exception $e) {;
            return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
        }
    }
}
