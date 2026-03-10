<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-users')->only('index');
        $this->middleware('permission:show-users')->only('show');
        $this->middleware('permission:create-users')->only(['create', 'store']);
        $this->middleware('permission:update-users')->only(['edit', 'update']);
        $this->middleware('permission:destroy-users')->only('destroy');
    }
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
        $papers = Role::all();
        return view('users.create', ['papers' => $papers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $papeis = [
                1 => 'Super Admin',
                2 => 'Usuário'
            ];
            $user->assignRole($papeis[$request->paper]);
            $id = User::where('cpf', $request->cpf)->first();
            return redirect()->route('users.show', ['user' => $id])->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
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
        $papers = Role::all();
        return view('users.edit', ['user' => $user, 'papers' => $papers]);
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
            $papeis = [
                1 => 'Super Admin',
                2 => 'Usuário'
            ];
            $user->syncRoles($papeis[$request->paper]);
            $id = User::where('cpf', $request->cpf)->first();
            return redirect()->route('users.show', ['user' => $id])->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->removeRole($user->getRoleNames()[0]);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
