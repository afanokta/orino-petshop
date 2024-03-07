<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Orino Petshop') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Referensi Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Styles -->
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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>

    <body style="background:#fdf9e5">
        <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
            <div class="container">
                <a class="navbar-brand fs-4 fw-bold" href="{{route('landing_page')}}" style="color: #f9ca0f;">
                    <img src="{{asset('media/orino-logo.svg')}}" alt="orino-logo" style="width: 45px; height: auto;">
                    Orino Petshop and Vet Clinic
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="mx-auto navbar-nav">
                        <li class="nav-item ps-3">
                            <a class="nav-link btn btn-warning text-black" aria-current="page" href="{{route('landing_page')}}#tentang-kami">BERANDA</a>
                        </li>
                        <li class="nav-item dropdown ps-3">
                            <a class="nav-link btn btn-warning text-black dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                LAYANAN KAMI
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('grooming_page')}}">GROOMING</a></li>
                                <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('pethotel_page')}}">PET HOTEL</a></li>
                            </ul>
                        <li class="nav-item ps-3">
                            <a class="nav-link btn btn-warning text-black fw-bold active" href="{{route('index_order')}}">ORDER</a>
                        </li>
                    </ul>
        
                    <ul class="navbar-nav">
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
                                    <a class="nav-link" href="{{route('create_product')}}">Buat Jadwal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('order_data')}}">Order</a>
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

        <section class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-3">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Order Invoice') }}</div>

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-body">
                            <h5 class="card-title">Order ID {{$order->id}}</h5>
                            <h6 class="card-subtittle mb-2 text-muted">By {{$order->user->name}}</h6>
                                
                            @if($order->is_paid == true)
                                <p class="card-text">Paid</p>
                            @else
                                <p class="card-text">Unpaid</p>
                            @endif    
                            <hr>

                            @foreach ($order->transactions as $transaction)
                                <p>{{$transaction->product->name}} - {{$transaction->amount}} pcs</p>
                                @php
                                    $total_price += $transaction->product->price * $transaction->amount;
                                @endphp
                            @endforeach
                            <hr>
                                <p>Total: {{$total_price}}</p>
                            <hr>

                            @if($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                                <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Upload bukti pembayaran</label><br>
                                        <input type="file" name="payment_receipt" class="form-control"><br>
                                    </div>    
                                        <button type="submit" class="btn btn-warning fw-bold mt-3">Kirim Pembayaran</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </body>
</html>