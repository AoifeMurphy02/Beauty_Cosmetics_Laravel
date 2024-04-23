<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nails and Beauty</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <p>header!</p>
    </header>
    <div>
        @yield('content')
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>
