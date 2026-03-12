@extends('layouts.admin')
@section('content')
    <div>
        <h2>Olá, {{ ucFirst($name) }}!</h2>

        <h4>Gastos (débito) atuais:</h4>
        @forelse ($debitos as $debito)
            <span>{{ $debito->name }} = {{ $debito->value }}</span><br>
        @empty
            <span>Não há despesas (débitos) cadastradas!</span><br>
        @endforelse
        <span>Fatura (cartão de crédito) deste mês = {{ $total_faturas_so_deste_mes }}</span><br>
        <span><strong>Total = {{ $total_debito }}</strong></span>
        <hr>

        <h4>Fatura (cartão de crédito) atual (e, se possuir, boletos em aberto):</h4>
        @forelse ($faturas_so_deste_mes as $fatura_so_deste_mes)
            <span>{{ $fatura_so_deste_mes->name }} = {{ $fatura_so_deste_mes->value }}</span><br>
        @empty
            <span>Não há dívidas na fatura de seu cartão deste mês!</span><br>
        @endforelse
        <span><strong>Total = {{ $total_faturas_so_deste_mes }}</strong></span>
        <hr>

        <h4>Pré-vizualização da próxima fatura:</h4>
        @forelse ($faturas_que_vem as $fatura_que_vem)
            <span>{{ $fatura_que_vem->name }} = {{ $fatura_que_vem->value }}</span><br>
        @empty
            <span>Não há faturas no cartão programadas para o próximo mês!</span><br>
        @endforelse
        <span><strong>Total = {{ $total_faturas_que_vem }}</strong></span>
        <hr>

        <h4>Pré-vizualização dos gastos (débito) referente ao mês que vem:</h4>
        @forelse ($debitos_mes_que_vem as $debito_mes_que_vem)
            <span>{{ $debito_mes_que_vem->name }} = {{ $debito_mes_que_vem->value }}</span><br>
        @empty
            <span>Não há despesas (débitos) programadas para o próximo mês!</span><br>
        @endforelse
        <span>Valor (atual) da próxima fatura = {{ $total_faturas_que_vem }}</span><br>
        <span><strong>Total = {{ $total_debitos_mes_que_vem }}</strong></span>
        <hr>

        <x-alert />

    </div>

    <script>
        function showAlert() {
            const lembretes = @json($lembretes);
            let textAlert = '';
            lembretes.forEach(lembrete => {
                textAlert += 'O prazo para o pagamento da despesa ' + lembrete.name +
                    ' encerra-se em 5 dias ou menos!\n';
            });

            if (textAlert !== '') {
                alert(textAlert);
            }
        }
        showAlert();
    </script>
@endsection
