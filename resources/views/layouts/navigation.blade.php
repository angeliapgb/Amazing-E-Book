<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Amazing E-Book') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand text-dark mx-auto" href="{{ route('home') }}">Amazing E-Book</a>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @guest
                        @if (Route::has('login'))
                            <a class="text-sm text-dark bg-warning" href="{{ route('register') }}">{{ __('translate.register') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="text-sm text-dark bg-warning" href="{{ route('login') }}">{{ __('translate.login') }}</a>
                        @endif
                    @else
                        <div class="menu-right">
                            <a class="link text-dark bg-warning" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('translate.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            @endif
        </nav>

        @if ( Auth::check())
        <nav class="navbar navbar-expand-lg bg-warning">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav mx-auto">
                <a class="nav-link active text-dark" href="{{ route('home') }}">{{ __('translate.home') }}<span class="sr-only">(current)</span></a>
                <a class="nav-link text-dark" href="{{ route('cart') }}">{{ __('translate.cart') }}</a>
                <a class="nav-link text-dark" href="{{ route('profile') }}">{{ __('translate.profile') }}</a>
                
                @if ( Auth::user()->role_id == 1 )
                    <a class="nav-link text-dark" href="{{ route('maintenance') }}">{{ __('translate.account maintenance') }}</a>
                @endif

                <div class="dropdown">
                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                        {{strtoupper(Lang::locale())}}
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="lang/id">ID</a>
                      <a class="dropdown-item" href="lang/en">EN</a>
                    </div>
                  </div>
                
              </div>
            </div>
        </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <nav class="navbar fixed-bottom">
        <span class="mb-0 mx-auto ">&copy; Amazing E-Book 2022</span>
    </nav>
</body>
</html>