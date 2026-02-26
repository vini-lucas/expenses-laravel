@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVO PARCELAMENTO</h2>

        <form action="{{ route('installments.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: 10x" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Criar"> - <a href="{{ route('installments.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
