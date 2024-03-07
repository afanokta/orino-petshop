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
            margin-left: 120px;
            box-sizing: border-box;
        }

        .card {
            border-radius: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: rgb(236, 247, 255);
        }

        .card:hover {
            transform: scale(1.05); 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
        }

        .card-img-top {
            height: 100px;
            width: auto;
            margin-top: 20px;
        }

        .hr-view {
          width: 20%; 
          border-width: 2px; 
          margin: 10px auto; 
          opacity: 0.5;
          color: #0f399c;
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

          <section class="content home-page">
                <div class="row mt-4">
                    <!-- Grooming Card -->
                    <div class="col-md-6">
                      <div class="card mb-4">
                          <a href="{{ route('show_groomingForm') }}">
                              <img src="{{ asset('media/adm-grooming.svg') }}" class="card-img-top mx-auto d-block" alt="Grooming">
                              <hr class="hr-view">
                          </a>
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Grooming</h5>
                              <p class="card-text">Description about grooming...</p>
                          </div>
                      </div>
                    </div>

                    <!-- Pet Hotel Card -->
                    <div class="col-md-6">
                      <div class="card mb-4">
                          <a href="{{ route('pethotel_page') }}">
                              <img src="{{ asset('media/adm-ph.svg') }}" class="card-img-top mx-auto d-block" alt="Pet Hotel">
                              <hr class="hr-view">
                          </a>
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Pet Hotel</h5>
                              <p class="card-text">Description about pet hotel...</p>
                          </div>
                      </div>
                    </div>

                    <!-- Orders Card -->
                    <div class="col-md-6 mt-5">
                      <div class="card mb-4">
                          <a href="{{ route('order_data') }}">
                              <img src="{{ asset('media/adm-order.svg') }}" class="card-img-top mx-auto d-block" alt="Orders">
                              <hr class="hr-view">
                          </a>
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Orders</h5>
                              <p class="card-text">Description about orders...</p>
                          </div>
                      </div>
                    </div>

                    <!-- Feedback Card -->
                    <div class="col-md-6 mt-5">
                      <div class="card mb-4">
                          <a href="{{ route('landing_page') }}">
                              <img src="{{ asset('media/adm-feedback.svg') }}" class="card-img-top mx-auto d-block" alt="Feedback">
                              <hr class="hr-view">
                          </a>
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Feedback</h5>
                              <p class="card-text">Description about feedback...</p>
                          </div>
                      </div>
                    </div>
              </div>
          </section>

      </div>
    </body>
</html>
