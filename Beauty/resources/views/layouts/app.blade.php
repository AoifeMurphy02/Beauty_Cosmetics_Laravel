<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/ico" href="{{ asset('images/favicon.ico') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nails and Beauty</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <a class="headerbanner" href="#">
            <img src="../../public/css/images/nailbar.png"/>
          </a>
          <nav>
            <a  href="/">Home</a>
            <a  href="/services" >Services</a>
            <a  href="/appointments" >Appointments</a>
            <a href="/staff" >Staff</a>
            <a  href="/aboutUs" >About Us</a>
            <a href="/gallery" >Gallery</a>
            <a href="/register" >Register</a>
    </nav>
    </header>
    <div>
        @yield('content')
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>
