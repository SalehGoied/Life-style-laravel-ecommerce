@extends('layouts.app')

@section('content')

<div>
    <div class="banner-image">
        <div class="container">
        <center>
            <div class="banner_content">
                <h1>We sell lifestyle.</h1>
                <p>Flat 40% OFF on premium brands</p> 
                <a href="{{ route('products.index') }}" class="btn btn-danger
                btn-lg active">Shop Now</a>  
            </div>
        </center>
        </div>
    </div>
    <div class="container">
            <h1 align="center">Latest Product</h1>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-sm-4">
                    <a href="{{ route('products.show', $product->id) }}" ><div class="thumbnail">
                            <img src="{{ url($product->image) }}" alt="{{ $product->title }}">
                            <div class="caption">
                                <h3>{{ $product->title }}</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div> 
                    </a>
                </div>
                @endforeach

            </div>
        </div>
@endsection
