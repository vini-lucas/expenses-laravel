@extends('layouts.admin')
@section('content')
    <div>
        <h2>Olá, {{ $name }}!</h2>

        <a href="{{ route('users.index') }}">Usuários</a> - <a href="{{ route('expenses.index') }}">Despesas</a> - <a href="{{ route('logoff') }}">Sair</a> <x-alert />
    </div>
@endsection
