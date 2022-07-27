@extends('layouts.app')

@section('content')
        <div class="container content">
            <!-- Jumbotron Header -->
                <div class="jumbotron home-spacer" id="products-jumbotron">
                    <h1>Welcome to our Lifestyle Store!</h1>
                    <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>

                </div>
                <hr>
            
                
                <div class="card mb-3">
                    <img class="card-img-top" src="{{url($product->image)}}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <p class="card-text">{{ $product->description }}</p>
                        <p>Price: Rs.{{ $product->price }} </p>
                        <a href="{{ route('products.addToCart', $product->id) }}" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            Add To Cart
                        </a>
                        <p class="card-text"><small class="text-muted">Last updated {{ $product->updated_at->format('Y-m-d') }}</small></p>
                    </div>
                </div>
                
        </div>
@endsection
