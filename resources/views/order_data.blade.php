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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
            margin-left: 80px;
        }

        .table {
            width: 1000px;
            background: rgb(202, 220, 220);
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
                <a href="{{route('grooming_page')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
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
                <a href="{{route('order_data')}}" class="nav-link d-flex align-items-center gap-2 mt-2 text-white" aria-current="page">
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
          <section class="content">
            <div class="container">
                <h1 class="text-center pd-4">List Order</h1>
                <hr>
        
                <form action="/filter" method="get">
                    <div class="row pb-3">
                    
                    <div class="col-md-5 pt-4">
                        <a href="{{route('index_order')}}" class="btn btn-success">Go To Order</a>
                    </div>
        
                    <div class="col-md-3">
                        <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control">
        
                    </div>
        
                    <div class="col-md-3">
                        <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control">
        
                    </div>
        
                    <div class="col-md-1 pt-4">
                        <button type="submit" class="btn btn-warning fw-bold">Filter</button>
                    </div>
        
                    </div>
        
                </form>
        
                <table class="table table-bordered table-hover table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Payment Status</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($orders as $order)
                            @php
                                $total_price = 0; 
                            @endphp
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>
                                    @if ($order->user->created_at)
                                        {{ $order->user->created_at->format('Y-m-d') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td> 
                                    @if($order->is_paid == true)
                                        <span class="text-success fw-bold">Paid</span>
                                    @else
                                        <span class="text-danger fw-bold">Unpaid</span>
                                    @endif  
                                </td>
                                <td>
                                    @if ($order->transactions)
                                        @foreach ($order->transactions as $transaction)
                                            @php
                                                $total_price += $transaction->product->price * $transaction->amount;
                                            @endphp
                                        @endforeach
                                    @endif
                                    <p>Total: {{$total_price}}</p>
                                </td>
                                <td>
                                    <form action="{{route('order_data', $order)}}" method="post" class="d-inline">
                                        @method('delete_order')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <!-- Add more actions/buttons as needed -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </section>
    </div>
    </body>
</html>



