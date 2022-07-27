@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>Products</h1>
    <hr>
    <h3>Add new product</h3>
    <br><br>

    <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data"  method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3">
            <input type="text" name="description" class="form-control" placeholder="Description" aria-label="description" aria-describedby="basic-addon2">
        </div>
        
        <div class="input-group mb-3">
            <input type="number" min="1" class="form-control" name="price"  placeholder="Price" id="basic-url" aria-describedby="basic-addon3">
        </div>
        
        <div class="input-group mb-3"> 
            <input name="image" type="file"  width="48" height="48" aria-label="Image">
            <label for="image">Image</label>
        </div>
        <img src="" alt="" width="150px" height="150px" hidden><br>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    
</div>

@endsection
@section('extra-script')
@endsection