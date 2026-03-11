@extends('layouts.admin')
@section('content')
    <div>
        <h2>NOVA DESPESA</h2>

        <form action="{{ route('expenses.store') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST') -

            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex.: Fatura da Sanepar"
                style="text-align: center;"><br><br> --

            <input type="text" name="value" id="value" value="{{ old('value') }}" placeholder="Ex.: R$100,00"
                style="text-align: center;" title="Se for parcelado informe o valor da parcela."><br><br> ---

            <label for="category_id">Categoria:</label> <select name="category_id" id="category_id"
                style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}
                        title="{{ $category->observation }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <br><br> ----

            <label for="payment_deadline_id">Prazo para vencimento da despesa:</label> <select name="payment_deadline_id"
                id="payment_deadline_id" style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($payments_deadline as $payment_deadline)
                    <option value="{{ $payment_deadline->id }}"
                        {{ $payment_deadline->id == old('payment_deadline_id') ? 'selected' : '' }}>
                        {{ $payment_deadline->name == 'SEM PRAZO DE VENCIMENTO' ? $payment_deadline->name : $payment_deadline->name }}
                    </option>
                @endforeach
            </select>
            <br><br> -----

            <label for="payment_method_id">Método de pagamento:</label> <select name="payment_method_id"
                id="payment_method_id" style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($payment_methods as $payment_method)
                    <option value="{{ $payment_method->id }}"
                        {{ $payment_method->id == old('payment_method_id') ? 'selected' : '' }}>
                        {{ $payment_method->name }}</option>
                @endforeach
                @foreach ($cards as $card)
                    <option value="{{ $card->id }}" {{ $card->id == old('payment_method_id') ? 'selected' : '' }}>
                        Crédito {{ '(' . $card->bank . ')' }} - final {{ $card->end }}</option>
                @endforeach
            </select> - <span>Seu cartão não está aqui? <a href="{{ route('cards.index') }}">Cadastre-o!</a></span>
            <br><br> ------

            <label for="installment_id">Parcelamento:</label> <select name="installment_id" id="installment_id"
                style="text-align: center;">
                <option value="no_info" selected>Selecione:</option>
                @foreach ($installments as $installment)
                    <option value="{{ $installment->id }}"
                        {{ $installment->id == old('installment_id') ? 'selected' : '' }}>{{ $installment->name }}
                    </option>
                @endforeach
            </select>
            <br><br>

            <input type="submit" value="Criar"> - <a href="{{ route('expenses.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>

    <script>
        document.getElementById('payment_method_id').addEventListener('change', () => {

            const paymentMethod = Number(document.getElementById('payment_method_id').value);
            const installment = document.getElementById('installment_id');

            if (paymentMethod != 2 && paymentMethod <= 5) {
                installment.value = "1";
            } else {
                installment.selectedIndex = "Selecione:";
            }
        });
    </script>
@endsection
