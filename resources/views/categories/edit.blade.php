@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') - 

            <input type="text" name="name" id="name" value="{{ $category->name }}" placeholder="Ex.: Lazer" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Salvar"> - <a href="{{ route('categories.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
