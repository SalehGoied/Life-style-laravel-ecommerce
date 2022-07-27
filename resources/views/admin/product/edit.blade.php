@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>Products</h1>
    <hr>
    <h3>Edit product</h3>
    <br><br>

    <form action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data"  method="post">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input value="{{ $product->title }}" type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3">
            <textarea value="{{ $product->description }}" type="text" name="description" class="form-control" placeholder="Description" aria-label="description" aria-describedby="basic-addon2">{{ $product->description }}</textarea>
        </div>
        
        <div class="input-group mb-3">
            <input value="{{ $product->price }}" type="number" min="1" class="form-control" name="price"  placeholder="Price" id="basic-url" aria-describedby="basic-addon3">
        </div>
        
        <div class="input-group mb-3 d-flex"> 
            <input id="files" type="file" name="image"  width="48" height="48" aria-label="Image">
            <label for="image">Image</label><br><br>
        </div>
        <img id="viewport" src="{{ url($product->image) }}" alt="{{ $product->title }}" width="150px" height="150px"><br>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
    {{-- <textarea name="" id="" cols="30" rows="10"> --}}
</div>
@endsection
@section('extra-script')
<script>
    var m, f, v;

    f = document.getElementById("files");
    v = document.getElementById("viewport");

    f.addEventListener("change", function(e){
        m = new FileReader();
        m.onload = function(e){
            v.src = e.target.result;
        };
        m.readAsDataURL(this.files[0]);
    });
</script>
@endsection
