<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginProccess(Request $request)
    {
        $validated = $request->validate(
            [
                'cpf' => 'required|digits:11',
                'password' => 'required'
            ],
            [
                'cpf.required' => 'Erro: o CPF é obrigatório!',
                'password.required' => 'Erro: a senha é obrigatória!',
                'cpf.digits' => 'Erro: CPF inválido!'
            ]
        );
        $cpf = preg_replace('/\D/', '', $request->cpf); // Aceita somente números.
        try {
            $authenticated = Auth::attempt([
                'cpf' => $cpf,
                'password' => $request->password
            ]);

            if (!$authenticated) {
                return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
            } else {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo de volta!');
            }
        } catch (Exception $e) {;
            return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProccess(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'cpf' => 'required|unique:users|digits:11',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Erro: o nome é obrigatório!',
                'cpf.required' => 'Erro: o CPF é obrigatório!',
                'email.required' => 'Erro: o e-mail é obrigatório!',
                'password.required' => 'Erro: a senha é obrigatória!',
                'cpf.unique' => 'Erro: já existe um registro com este CPF!',
                'email.email' => 'Erro: e-mail inválido!',
                'email.unique' => 'Erro: já existe um registro com este e-mail!',
                'password.min' => 'Erro: a senha precisa possuir ao mínimo 6 caracteres!',
                'cpf.digits' => 'Erro: CPF inválido!'
            ]
        );
        try {
            User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('login')->with('success', 'Êxito: registro inserido com sucesso, realize o login!');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    public function logoff()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logoff realizado com sucesso. Volte sempre!');
    }
}
