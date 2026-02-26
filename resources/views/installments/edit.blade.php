@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('installments.update', ['installments' => $installment->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') - 

            <input type="text" name="name" id="name" value="{{ $installment->name }}" placeholder="Ex.: 10x" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Salvar"> - <a href="{{ route('installments.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
