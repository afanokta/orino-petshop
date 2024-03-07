<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        section {
        padding-top: 64px;
        position: relative;
    }

    section::before {
        z-index: -1;
        content: '';
        font-size: 64px;
        color: grey;
        opacity: 0.25;
        position: absolute;
        font-weight: 600;
        top: 20px;
        left: -10px;
    }

    .navbar .nav-link:hover {
        font-weight: bold;
    }

    .navbar {
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.25);
    }

        .navbar-nav .nav-item .nav-link.btn:hover,
        .navbar-nav .nav-item .nav-link.btn:active,
        .navbar-nav .nav-item .nav-link.btn:focus {
            background-color: #FFCC00 !important;
        }
    </style>
</head>
    <body style="background-color: #fdf9e5">
        <div id="app">
            <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
                <div class="container">
                    <a class="navbar-brand fs-4 fw-bold" href="{{route('landing_page')}}" style="color: #f9ca0f;">
                        <img src="{{asset('media/orino-logo.svg')}}" alt="orino-logo"
                        style="width: 45px; height: auto;">
                        Orino Petshop and Vet Clinic
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('create_product')}}">Create Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('order_data')}}">List Order</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning text-black" href="{{route('show_profile')}}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning text-black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
