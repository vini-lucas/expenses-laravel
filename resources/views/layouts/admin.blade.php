<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expenses - Administrativo</title>
</head>

<body>
    |
    <a href="{{ route('dashboard') }}">Dashboard</a> -

    @can('index-users')
        <a href="{{ route('users.index') }}">Usuários</a> -
    @endcan

    @can('index-expenses')
        <a href="{{ route('expenses.index') }}">Despesas</a> -
    @endcan

    @can('index-cards')
        <a href="{{ route('cards.index') }}">Cartões</a> -
    @endcan

    @can('index-categories')
        <a href="{{ route('categories.index') }}">Categorias</a> -
    @endcan

    @can('index-installments')
        <a href="{{ route('installments.index') }}">Parcelamentos</a> -
    @endcan

    @can('index-payment_methods')
        <a href="{{ route('payment_methods.index') }}">Métodos de pagamento</a> -
    @endcan

    @can('index-payments_deadline')
        <a href="{{ route('payments_deadline.index') }}">Prazos para vencimento</a> -
    @endcan

    <a href="{{ route('logoff') }}">Sair</a>
    |
    <br>
    @yield('content')
</body>

</html>
