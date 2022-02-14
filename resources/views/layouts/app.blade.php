<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Amazing E-Book') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    {{-- <div id="app"> --}}
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand text-dark mx-auto" href="{{ route('home') }}">Amazing E-Book</a>
            @if (Route::has('login'))
                <div class="user-access hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @guest
                        @if (Route::has('login'))
                            <a class="ml-4 text-sm text-dark bg-warning" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="text-sm text-dark bg-warning" href="{{ route('login') }}">{{ __('Log In') }}</a>
                        @endif
                    @else
                        <div class="menu-right">
                            <a class="link text-dark" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            @endif
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    {{-- </div> --}}
    
    <nav class="navbar fixed-bottom">
        <span class="mb-0 mx-auto ">&copy; Amazing E-Book 2022</span>
    </nav>
</body>
</html>
