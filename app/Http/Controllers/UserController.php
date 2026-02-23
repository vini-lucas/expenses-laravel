<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get(['name', 'cpf', 'id']);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $id = User::where('cpf', $request->cpf)->first();
            return redirect()->route('users.show', ['user' => $id])->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $id = User::where('cpf', $request->cpf)->first();
            return redirect()->route('users.show', ['user' => $id])->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
