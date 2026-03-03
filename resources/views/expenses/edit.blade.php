@extends('layouts.admin')
@section('content')
    <div>
        <h2>EDITAR</h2>

        <form action="{{ route('expenses.update', ['expense' => $expense->id]) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT') -

            <input type="text" name="name" id="name" value="{{ $expense->name }}" placeholder="Ex.: Fatura da Sanepar"
                style="text-align: center;"><br><br> --

            <input type="text" name="value" id="value" value="{{ $expense->value }}" placeholder="Ex.: R$100,00"
                style="text-align: center;"><br><br> ---

            <label for="payment_deadline_id">Prazo para vencimento da despesa:</label> <select name="payment_deadline_id"
                id="payment_deadline_id" style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($payments_deadline as $payment_deadline)
                    <option value="{{ $payment_deadline->id }}"
                        {{ $payment_deadline->id == $expense->payment_deadline_id ? 'selected' : '' }}>
                        {{ $payment_deadline->name == 'SEM PRAZO DE VENCIMENTO' ? $payment_deadline->name : $payment_deadline->name }}
                    </option>
                @endforeach
            </select>
            <br><br> ----

            <label for="installment_id">Parcelamento:</label> <select name="installment_id" id="installment_id"
                style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($installments as $installment)
                    <option value="{{ $installment->id }}"
                        {{ $installment->id == $expense->installment_id ? 'selected' : '' }}>{{ $installment->name }}
                    </option>
                @endforeach
            </select>
            <br><br> -----

            <label for="payment_method_id">Método de pagamento:</label> <select name="payment_method_id"
                id="payment_method_id" style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($payment_methods as $payment_method)
                    <option value="{{ $payment_method->id }}"
                        {{ $payment_method->id == $expense->payment_method_id ? 'selected' : '' }}>
                        {{ $payment_method->name }}</option>
                @endforeach
                @foreach ($cards as $card)
                    <option value="{{ $card->id }}"
                        {{ $expense->payment_method_id == 3 ? ($expense->card_id == $card->id ? 'selected' : '') : '' }}>
                        Crédito {{ '(' . $card->bank . ')' }} - final {{ $card->end }}</option>
                @endforeach
            </select>
            <br><br> ------

            <label for="category_id">Categoria:</label> <select name="category_id" id="category_id"
                style="text-align: center;">
                <option value="" selected>Selecione:</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? 'selected' : '' }}
                        title="{{ $category->observation }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <br><br> -------

            <input type="submit" value="Salvar"> - <a href="{{ route('expenses.index') }}">Listar</a> <x-alert />

        </form><br>
    </div>
@endsection
