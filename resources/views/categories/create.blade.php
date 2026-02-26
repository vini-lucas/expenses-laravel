@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVA CATEGORIA</h2>

        <form action="{{ route('categories.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') -

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Lazer"
                style="text-align: center;"><br><br> --

            <textarea name="observation" id="observation" placeholder="Ex.: Açaí, sapatos ..." value="{{ old('observation') }}"></textarea>
            <br><br>

            <input type="submit" value="Criar"> - <a href="{{ route('categories.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
