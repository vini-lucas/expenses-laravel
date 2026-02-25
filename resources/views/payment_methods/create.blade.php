@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVO MÉTODO DE PAGAMENTO</h2>

        <form action="{{ route('payment_methods.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Boleto" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Criar"> - <a href="{{ route('payment_methods.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
