@extends('layouts.login')
@section('content')
<div>
    <h1>Conecte-se!</h1>

    <form action="{{ route('login.proccess') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" placeholder="XXX.XXX.XXX-XX" style="text-align: center;"><br><br> -- 

            <input type="password" name="password" id="password" placeholder="***************" style="text-align: center;"><br><br>

            <input type="submit" value="Entrar"> - <a href="{{ route('register') }}">Sou NOVO</a> <x-alert />

        </form><br>
</div>
@endsection
