<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expenses - Administrativo</title>
</head>
<body>

     | <a href="{{ route('dashboard') }}">Dashboard</a> - <a href="{{ route('logoff') }}">Sair</a> | <br>
    @yield('content')
</body>
</html>
