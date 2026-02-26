@extends('layouts.login')
@section('content')
<div>
        <h1>Registre-se!</h1>

        <form action="{{ route('register.proccess') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Lucas Vinicius" style="text-align: center;"><br><br> -- 

            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" placeholder="XXX.XXX.XXX-XX" style="text-align: center;"><br><br> ---

            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="exemplo@dominio.extensão" style="text-align: center;"><br><br> ----

            <input type="password" name="password" id="password" placeholder="***************" style="text-align: center;"><br><br>

            <input type="submit" value="Avançar"> - <a href="{{ route('login') }}">Entrar</a> <x-alert />

        </form><br>
    </div>
@endsection
