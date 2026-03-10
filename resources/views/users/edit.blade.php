@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') - 

            <select name="paper" id="paper">
                <option value="">Selecione:</option>
                @foreach ($papers as $paper)
                    <option value="{{ $paper->id }}" {{ $user->getRoleNames()[0] == $paper->name ? 'selected' : ''}}>{{ $paper->name }}</option>
                @endforeach
                
            </select><br><br> --

            <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Ex.: Lucas Vinicius" style="text-align: center;"><br><br> ---

            <input type="text" name="cpf" id="cpf" value="{{ $user->cpf }}" placeholder="XXX.XXX.XXX-XX" style="text-align: center;"><br><br> ----

            <input type="email" name="email" id="email" value="{{ $user->email }}" placeholder="exemplo@dominio.extensão" style="text-align: center;"><br><br> -----

            <input type="password" name="password" id="password" placeholder="***************" style="text-align: center;"><br><br>

            <input type="submit" value="Salvar"> - <a href="{{ route('users.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
