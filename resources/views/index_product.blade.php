@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Products') }} </div>
                <nav class="navbar">
                    <div class="container">
                      <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
                

                <div class="card-group d-flex justify-content-center">
                    @foreach ($products as $product)
                    <div class="card-m-3" style="width: 15rem; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2); margin: 10px;">
                        <img class="card-img-top" src="{{url('storage/'. $product->image)}}" alt="Card image cap" 
                        style="height: 180px; justify-content:space-between;">
                    
                            <div class="card-body">
                                <p class="card-text">{{$product->name}}</p>
                                <form action="{{route('show_product', $product)}}" method="get">
                                    <button type="submit" class="btn btn-primary">Show Detail</button>
                            </form>
                    
                            @if(Auth::check()&&Auth::user()->is_admin)
                            <form action="{{route('delete_product', $product)}}" method="post">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger mt-2">Delete Product</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
