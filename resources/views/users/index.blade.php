@extends('layouts.admin')
@section('content')
    <div>
        <h2>USUÁRIOS</h2>

        <table>

            @forelse ($users as $user)
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->cpf }}
                        </td>
                        <td>
                            <a href="">Vizualizar</a> - <a href="">Editar</a> - <a href="">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            @empty
                <span style="color: red">0 registos encontrados!</span>
            @endforelse

        </table><br>

        <a href="{{ route('users.create') }}">Criar</a>
    </div>
@endsection
