@extends('layouts.admin')
@section('content')
    <div>
        <h2>Olá, {{ $name }}!</h2>

        <h4>Gastos (débito) atuais:</h4>
        @forelse ($debitos as $debito)
            <span>{{ $debito->name }} = {{ $debito->value }}</span><br>
        @empty
            <span>Não há despesas (débitos) cadastradas!</span><br>
        @endforelse
        <span>Total = {{ $total_debito }}</span>
        <hr>

        <h4>Pré-vizualização da próxima fatura:</h4>
        @forelse ($faturas_que_vem as $fatura_que_vem)
            <span>{{ $fatura_que_vem->name }} = {{ $fatura_que_vem->value }}</span><br>
        @empty
            <span>Não há faturas no cartão programadas para o próximo mês!</span><br>
        @endforelse
        <span>Total: {{ $total_faturas_que_vem }}</span>
        <hr>

        <h4>Fatura atual:</h4>
        @forelse ($faturas_so_deste_mes as $fatura_so_deste_mes)
            <span>{{ $fatura_so_deste_mes->name }} = {{ $fatura_so_deste_mes->value }}</span><br>
        @empty
            <span>Não há dívidas na fatura de seu cartão programadas para este mês!</span><br>
        @endforelse
        <span>Total: {{ $total_faturas_so_deste_mes }}</span>
        <hr>

        <x-alert />

    </div>
@endsection
