@extends('layouts.admin')
@section('content')
    <div>
        <h2>DETALHES</h2>

        <ul>
            <li><strong> - ID:</strong> ---------- {{ $user->id }}</li>
            <li><strong> -- Nome:</strong> ----- {{ $user->name }}</li>
            <li><strong> --- CPF:</strong> ------ {{ $user->cpf }}</li>
            <li><strong> ---- E-mail:</strong> -- {{ $user->email }}</li>
        </ul>

        <a href="{{ route('users.index') }}">Listar</a> <x-alert />
    </div>
@endsection
