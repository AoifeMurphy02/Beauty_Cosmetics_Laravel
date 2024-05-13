<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/footer.css') }}" rel="stylesheet">
    <link href="{{ mix('css/aboutus.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="container">
                <nav class="navigation">
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
    

</body>
</html>