@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>Cityes</h1>
    <hr>
    <h3>Edit City</h3>
    <br><br>

    <form action="{{route('admin.city.update', $city->id)}}" enctype="multipart/form-data"  method="post">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input value="{{ $city->name }}" type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3">
            <input value="{{ $city->price }}" type="number" min="1" class="form-control" name="price"  placeholder="Price" id="basic-url" aria-describedby="basic-addon3">
        </div>
        
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
