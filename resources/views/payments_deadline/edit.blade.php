@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        {{-- <form action="{{ route('payments_deadline.update', ['payments_deadline' => $payment_deadline->id]) }}" method="POST" autocomplete="off"> --}}
            @csrf
            @method('PUT') - 

            <input type="text" name="name" id="name" value="{{ $payment_deadline->name }}" placeholder="Ex.: Dia 10" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Salvar"> - <a href="{{ route('payments_deadline.index') }}">Listar</a> <x-alert />

            {{ dd($payment_deadline) }}

        </form><br>
    </div>
@endsection
