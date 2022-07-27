@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>Cities</h1>
    <hr>
    <h3>Add new City</h3>
    <br><br>

    <form action="{{ route('admin.city.store') }}" enctype="multipart/form-data"  method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="City Name" aria-label="Name" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3">
            <input type="number" min="1" class="form-control" name="price"  placeholder="Price" id="basic-url" aria-describedby="basic-addon3">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    
</div>

@endsection
@section('extra-script')
@endsection