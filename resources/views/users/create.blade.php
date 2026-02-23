@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVO USUÁRIO</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Lucas Vinicius" style="text-align: center;"><br><br> -- 

            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" placeholder="XXX.XXX.XXX-XX" style="text-align: center;"><br><br> ---

            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="exemplo@dominio.extensão" style="text-align: center;"><br><br> ----

            <input type="password" name="password" id="password" placeholder="***************" style="text-align: center;"><br><br>

            <input type="submit" value="Criar"> - <a href="{{ route('users.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
