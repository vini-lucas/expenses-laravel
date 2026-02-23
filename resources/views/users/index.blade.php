@extends('layouts.admin')
@section('content')
    <div>
        <h2>USUÁRIOS</h2>

        <div style="justify-content: space-between; width: 100%; heigth: auto; display: flex;">
            <table style="border: solid; border-color: black; border-width: 2px;">

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
                                <button type="button" id="buttonModalInfoUser">Vizualizar</button> - <a
                                    href="">Editar</a> - <a href="">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <span style="color: red">0 registos encontrados!</span>
                @endforelse

            </table><br>
            <div style="width: 300px; height: 150px; background-color: black;" id="modalInfoUser">
                
            </div>
        </div>

        <a href="{{ route('users.create') }}">Criar</a> <x-alert />
    </div>

    <script>
        if (document.getElementById('buttonModalInfoUser').addAdventListener('click', () => {
                e.preventDefault();

            }))
    </script>
@endsection
