@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVA DESPESA</h2>

        <form action="{{ route('categories.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Lazer" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Criar"> - <a href="{{ route('categories.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
