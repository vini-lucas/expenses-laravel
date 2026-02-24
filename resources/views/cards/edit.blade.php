@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('cards.update', ['card' => $card->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') - 

            <input type="text" name="bank" id="bank" value="{{ $card->bank }}" placeholder="Ex.: Nubank" style="text-align: center;"><br><br> -- 

            <input type="text" name="end" id="end" value="{{ $card->end }}" placeholder="Ex.: 1234" style="text-align: center;"><br><br> ---

            <input type="submit" value="Salvar"> - <a href="{{ route('cards.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
