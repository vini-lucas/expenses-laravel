@extends('layouts.admin')
@section('content')
    <div>
        <h2>MÉTODOS DE PAGAMENTO</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($payment_methods as $payment_method)
                <tbody>
                    <tr>
                        <td>
                            {{ $payment_method->name }}
                        </td>
                        <td>
                            <a href="{{ route('payment_methods.edit', ['payment_method' => $payment_method->id]) }}">Editar</a>
                            <form action="{{ route('payment_methods.destroy', ['payment_method' => $payment_method->id]) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 30px;" type="submit"
                                    onclick="return confirm('Confirma a exclusão do registro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @empty
                <span style="color: red">0 registos encontrados!</span>
            @endforelse

        </table><br>

        <a href="{{ route('payment_methods.create') }}">Criar</a> <x-alert />
    </div>
@endsection
