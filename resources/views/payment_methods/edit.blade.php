@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('payment_methods.update', ['payment_method' => $payment_method->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') - 

            <input type="text" name="name" id="name" value="{{ $payment_method->name }}" placeholder="Ex.: Boleto" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Salvar"> - <a href="{{ route('payment_methods.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
