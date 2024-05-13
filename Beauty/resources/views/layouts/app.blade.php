<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ in_array(Route::currentRouteName(), ['staff', 'gallery', 'appointments', 'services.index']) ? 'transparent-header' : '' }}">
    <div id="app">
        <header id="main-header" class="header {{ in_array(Route::currentRouteName(), ['staff', 'gallery', 'appointments', 'services.index']) ? 'transparent' : 'solid' }}">
            <div class="container">
                <nav id="main-navigation" class="navigation {{ in_array(Route::currentRouteName(), ['staff', 'gallery', 'appointments', 'services.index']) ? 'text-white' : '' }}">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/aboutUs" class="nav-link">About</a>
                    <a href="/services" class="nav-link">Services</a>
                    <a href="/appointments" class="nav-link">Appointments</a>
                    <a href="{{ url('/') }}" class="nav-logo">
                        GLAMOUR TOUCH
                        <span class="logo-subtext">Nails & Beauty</span>
                    </a>
                    <a href="/staff" class="nav-link">Staff</a>
                    <a href="/gallery" class="nav-link">Gallery</a>
                    <a href="/aboutUs" class="nav-link">About</a>
                    @guest
                        <a class="nav-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class="nav-user">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        @yield('content')
    </div>
@include('layouts.footer')
    <script>
        // JavaScript to handle scroll event on pages with transparent header
        if (document.body.classList.contains('transparent-header')) {
            window.addEventListener('scroll', function() {
                const header = document.getElementById('main-header');
                const navigation = document.getElementById('main-navigation');
                if (window.scrollY > 50) {
                    header.classList.remove('transparent');
                    header.classList.add('solid');
                    navigation.classList.remove('text-white');
                    navigation.classList.add('text-black');
                } else {
                    header.classList.remove('solid');
                    header.classList.add('transparent');
                    navigation.classList.remove('text-black');
                    navigation.classList.add('text-white');
                }
            });
        } else {
                console.log('Transparent header class not applied.');
            }
    </script>
</body>
</html>
