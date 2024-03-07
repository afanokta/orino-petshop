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
         .nav-link:hover {
            background-color: rgb(126, 126, 73);
        }

        body {
            display: flex;
            background: #bdbcba;
        }

        .sidebar {
            width: 300px;
            height: 100vh;
            position: sticky;
            top: 0;
            background-color: #222;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            flex-shrink: 0;
            z-index: 1;
        }

        .row {
            display: flex;
        }

        .content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            align-content: center;
        }

        .card {
            width: 840px;
            margin-top: 20px;
        }

    
    </style>
    </head>
    <body>
        <div class="row">
            <div class="sidebar">
                <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                    <img src="{{asset('media/orino-logo.svg')}}" alt="orino-logo"
                            style="width: 45px; height: auto;">
                    <span class="fs-4 text-warning ms-3">Orino Petshop</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/admin" class="nav-link d-flex align-items-center gap-2 text-white" aria-current="page">
                    @include("icons/home")
                    Home
                    </a>
                </li>
                <li>
                    <a href="{{route('show_groomingForm')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
                        @include("icons/grooming")
                        Grooming
                    </a>
                </li>
                <li>
                    <a href="{{route('pethotel_page')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
                        @include("icons/hotel")
                        Pet Hotel
                    </a>
                </li>
                <li>
                    <a href="{{route('order_data')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
                        @include("icons/order")
                        Orders
                    </a>
                </li>
                <li>
                    <a href="{{route('landing_page')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
                        @include("icons/orders")
                        Feedback
                    </a>
                </li>
                </ul>
                <hr>
                <div class="dropdown position-absolute bottom-0 mb-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin Orino</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="{{route('show_profile')}}">Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </li>
                </ul>
                </div>
            </div>

                <div class="content">
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #FFEFB0">{{ __('Form Grooming') }}</div>

                                <div class="card-body">
                                    <form id="groomingForm" action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input type="text" name="name" placeholder="Nama" class="form-control" required><br>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" placeholder="Alamat" class="form-control" required><br>
                                        </div>

                                        <div class="form-group">
                                            <label>No.HP</label>
                                            <input type="text" name="hp" placeholder="0821..." class="form-control" required><br>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Hewan</label>
                                            <input type="text" name="nama hewan" placeholder="Nama Hewan Peliharaan" class="form-control" required><br>
                                        </div>  

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="kelamin" class="form-control" required>
                                                <option value="jantan">Jantan</option>
                                                <option value="betina">Betina</option>
                                            </select><br>
                                        </div>  

                                        <div class="form-group">
                                            <label>Sinyalement</label>
                                            <input type="text" name="kelamin" placeholder="Jenis Kelamin Hewan" class="form-control" required><br>
                                        </div>  

                                        <div class="form-group">
                                            <label>Perlengkapan yang Dibawa</label>
                                            <input type="text" name="perlengkapan" placeholder="Perlengkapan" class="form-control" required><br>
                                        </div>  

                                        <div class="form-group">
                                            <label>Jenis Grooming</label>
                                            <select name="grooming" class="form-control" required>
                                                <option value="biasa">Grooming Biasa</option>
                                                <option value="kutu">Grooming Kutu</option>
                                                <option value="jamur">Grooming Jamur</option>
                                                <option value="komplit">Grooming Komplit</option>
                                            </select><br>
                                        </div>  

                                        <div class="form-group">
                                            <label>Catatan Groomer</label>
                                            <input type="text" name="catatan" placeholder="Catatan Untuk Groomer" class="form-control" required><br>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
    </body>
</html>