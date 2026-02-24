@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVO CARTÃO DE CRÉDITO</h2>

        <form action="{{ route('cards.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="bank" id="bank" value="{{ old('bank') }}" placeholder="Ex.: Nubank" style="text-align: center;"><br><br> -- 

            <input type="text" name="end" id="end" value="{{ old('end') }}" placeholder="4 últimos digitos" style="text-align: center;"><br><br> ---

            <input type="submit" value="Criar"> - <a href="{{ route('cards.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
