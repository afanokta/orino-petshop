@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products Detail') }}</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <img src="{{url('storage/'. $product->image)}}" alt="" width="300px" style="height: 300px">
                            </div>    

                                <div class="">
                                    <h1>{{$product->name}}</h1>
                                    <h6>{{$product->description}}</p>
                                    <h3>Rp{{$product->price}}</p>
                                    <hr>
                                    <p>{{$product->stock}} left</p>
                                
                                @if(!Auth::user()->is_admin)
                                <form action="{{route('add_to_cart', $product)}}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2" 
                                        name="amount" value="1">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary">Add to Cart</button>    
                                    </div>    
                                </div>
                                </form>
                                @else
                                    <form action="{{route('edit_product', $product)}}" method="get">
                                        <button class="btn btn-primary" type="submit">Edit Product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        
                        @if($errors->any())
                        @foreach ($errors->all as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection