@extends('layouts.admin')
@section('content')
    <div>
        <h2>PARCELAMENTOS</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($installments as $installment)
                <tbody>
                    <tr>
                        <td>
                            {{ $installment->name }}
                        </td>
                        <td>
                            <a href="{{ route('installments.edit', ['installment' => $installment]) }}">Editar</a>
                            <form action="{{ route('installments.destroy', ['installment' => $installment->id]) }}" method="POST"
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

        <a href="{{ route('installments.create') }}">Criar</a> <x-alert />
    </div>
@endsection
