@extends('layouts.admin')
@section('content')
    <div>
        <h2>DESPESAS</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($expenses as $expense)
                <tbody>
                    <tr>
                        <td>
                            {{ $expense->name }}
                        </td>
                        <td>
                            {{ $expense->value }}
                        </td>
                        <td>
                            <a href="{{ route('expenses.edit', ['expense' => $expense->id]) }}">Editar</a>
                            <form action="{{ route('expenses.destroy', ['expense' => $expense->id]) }}" method="POST"
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

        <a href="{{ route('expenses.create') }}">Criar</a> <x-alert />
    </div>
@endsection
