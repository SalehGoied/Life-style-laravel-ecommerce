@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>Products</h1>
    <hr>
    <a href="{{ route('admin.products.add') }}" class="mb-3"><button class="btn btn-primary">Add new product</button></a>
    <br><br>
    <table class="table table-bordered table-hover">
        <caption>List of Products</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                {{-- <th scope="col">Quntaty</th> --}}
                <th scope="col">Image</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ Str::limit($product->description , 30, '...')}}</td>
                    <td>{{ $product->price }}</td>
                    {{-- <td>{{ $product->quntaty }}</td> --}}
                    <td class="w-20 h-100"><img src="{{ url($product->image) }}" alt="{{ $product->title }}"></td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a class="text-white" href="{{route('admin.products.edit', $product->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a class="text-white" href="{{ route('admin.products.delete', $product->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                            <button class="btn btn-danger text-white close-button"><i class="fa">&#x2715</i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection
@section('extra-script')
@endsection