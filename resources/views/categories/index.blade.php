@extends('layouts.admin')
@section('content')
    <div>
        <h2>CATEGORIAS</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($categories as $category)
                <tbody>
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}">Editar</a>
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST"
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

        <a href="{{ route('categories.create') }}">Criar</a> <x-alert />
    </div>
@endsection
