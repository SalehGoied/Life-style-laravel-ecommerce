@extends('layouts.app')

@section('content')
        <div class="container content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to our Lifestyle Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>

            </div>
            <hr>
            
            {{-- <div class="row text-center" id="cameras">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/5.jpg" alt="">
                        <div class="caption">
                            <h3>Cannon EOS </h3>
                            <p>Price: Rs. 36000.00 </p>
                        </div>
                    </div>
                </div> --}}
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-6">
                                <img class="img-thumbnail" src="../{{$product->image}}" alt="{{ $product->title }}">
                                <div class="align-bottom">    
                                    <div class="caption">
                                        <h3><a class="text-dark" href="">{{ $product->title }} </a></h3>
                                        <p>Price: Rs.{{ $product->price }} </p>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn details px-auto">view details</a><br />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                

            </div>
@endsection