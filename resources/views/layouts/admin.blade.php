<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expenses - Administrativo</title>
</head>
<body>

     | <a href="{{ route('dashboard') }}">Dashboard</a> - <a href="{{ route('users.index') }}">Usuários</a> - <a href="{{ route('expenses.index') }}">Despesas</a> - <a href="{{ route('cards.index') }}">Cartões</a> - <a href="{{ route('categories.index') }}">Categorias</a> - <a href="{{ route('installments.index') }}">Parcelamentos</a> - <a href="{{ route('payment_methods.index') }}">Métodos de pagamento</a> - <a href="{{ route('payments_deadline.index') }}">Prazos para vencimento</a> - <a href="{{ route('logoff') }}">Sair</a> | <br>
    @yield('content')
</body>
</html>
