@extends('layouts.admin')
@section('content')
    <div>
        <h2>CARTÕES DE CRÉDITO</h2>

        <table>

            <thead>
                <tr>
                    <th>Banco</th>
                    <th>Final</th>
                    <th>Fatura</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @forelse ($cards as $card)
                <tbody>
                    <tr>
                        <td>
                            {{ $card->bank }}
                        </td>
                        <td>
                            {{ $card->end }}
                        </td>
                        <td>
                            {{ $card->current_invoice == '' ? '0,00' : $card->current_invoice }}
                        </td>
                        <td>
                            <a href="{{ route('cards.edit', ['card' => $card->id]) }}">Editar</a>
                            <form action="{{ route('cards.destroy', ['card' => $card->id]) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 30px;" type="submit"
                                    onclick="return confirm('Confirma a exclusão do registro?')">Excluir</button>
                            </form>
                            <button type="button" onclick="openModal({{ $card->id }})">Resumo da fatura (atual)</button>
                        </td>
                    </tr>
                </tbody>

                <div id="invoiceSummary-{{ $card->id }}" style="display: none;">

                    @foreach ($card->invoice_history ?? [] as $a)
                        @foreach ($a as $b => $c)
                            <span>Despesa: {{ ucfirst($b) }} - Valor: {{ $c }} </span>-----|------ 
                            
                        @endforeach
                        <br>
                    @endforeach
                    <button type="button" id="buttonInvoiceSummary-{{ $card->id }}"
                        onclick="closeModal({{ $card->id }})">Fechar</button>
                    
                </div>
            @empty
                <span style="color: red">0 registos encontrados!</span>
            @endforelse

        </table><br>

        <a href="{{ route('cards.create') }}">Criar</a> <x-alert />
    </div>

    <script>
        function openModal(id) {
            if (document.getElementById('invoiceSummary-' + id).style.display == "none") {
                document.getElementById('invoiceSummary-' + id).style.display = "flex";
            } else {
                document.getElementById('invoiceSummary-' + id).style.display = "none";
            }
        }

        function closeModal(id) {
            document.getElementById('invoiceSummary-' + id).style.display = "none";
        }
    </script>
@endsection
