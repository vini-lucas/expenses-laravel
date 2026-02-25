@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVO PRAZO DE PAGAMENTO</h2>

        <form action="{{ route('payments_deadline.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') - 

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Dia 10" style="text-align: center;"><br><br> -- 

            <input type="submit" value="Criar"> - <a href="{{ route('payments_deadline.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
