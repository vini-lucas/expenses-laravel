@extends('layouts.admin')
@section('content')
    <div>
        <h2>PRAZOS PARA VENCIMENTO</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($payments_deadline as $payment_deadline)
                <tbody>
                    <tr>
                        <td>
                            {{ $payment_deadline->name }}
                        </td>
                        <td>
                            <a href="{{ route('payments_deadline.edit', ['payment_deadline' => $payment_deadline->id]) }}">Editar</a>
                            <form action="{{ route('payments_deadline.destroy', ['payment_deadline' => $payment_deadline->id]) }}" method="POST"
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

        <a href="{{ route('payments_deadline.create') }}">Criar</a> <x-alert />
    </div>
@endsection
