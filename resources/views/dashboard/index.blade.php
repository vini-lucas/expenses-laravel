@extends('layouts.admin')
@section('content')
    <div>
        <h2>Olá, {{ $name }}!</h2>
        <h4>Segue sua fatura atual:</h4>

        @forelse ($debitos as $debito)
            <span>{{ $debito->name }} = {{ $debito->value }}</span><br>
        @empty
            <span>Não há despesas cadastradas!</span><br>
        @endforelse

        <span>Total = {{ $total }}</span>

        <h4>Pré-vizualização da próxima fatura:</h4>

        @forelse ($parcelados as $parcelado)
            <span>{{ $parcelado->name }} = {{ $parcelado->value }}</span><br>
        @empty
            
        @endforelse

        @foreach ($fixas as $fixa)
            <span>{{ $fixa->name }} = {{ $fixa->value }}</span><br>
        @endforeach

        <span>Total = {{ $total_proxima }}</span>

        <x-alert />

    </div>
@endsection
