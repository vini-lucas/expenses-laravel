@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVA DESPESA    </h2>

        <form action="{{ route('expenses.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Fatura da Sanepar" style="text-align: center;"><br><br> -- 

            <input type="text" name="value" id="value" value="{{ old('value') }}" placeholder="Ex.: R$100,00" style="text-align: center;"><br><br> ---

            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" style="text-align: center;"><br><br> ----

            <input type="password" name="password" id="password" placeholder="***************" style="text-align: center;"><br><br>

            <input type="submit" value="Criar"> - <a href="{{ route('users.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
