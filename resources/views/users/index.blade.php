@extends('layouts.admin')
@section('content')
    <div>
        <h2>USUÁRIOS</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($users as $user)
                <tbody>
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->cpf }}
                        </td>
                        <td>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}">Vizualizar</a> - <a
                                href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 30px;" type="submit" onclick="return confirm('Confirma a exclusão do registro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @empty
                <span style="color: red">0 registos encontrados!</span>
            @endforelse

        </table><br>

        <a href="{{ route('users.create') }}">Criar</a> <x-alert />
    </div>

    <script>
        if (document.getElementById('buttonModalInfoUser').addAdventListener('click', () => {
                e.preventDefault();

            }))
    </script>
@endsection
