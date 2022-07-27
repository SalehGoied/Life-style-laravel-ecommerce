@extends('admin.partials.app')

@section('content')

<div class="container w-100 pb-5">
    <h1>City</h1>
    <hr>
    <a href="{{ route('admin.city.create') }}" class="mb-3"><button class="btn btn-primary">Add new City</button></a>
    <br><br>
    <table class="table table-bordered table-hover">
        <caption>List of City</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Shipping</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->price }}</td>
                    <td class="d-inlain">
                        <a class="text-white" href="{{route('admin.city.edit', $city->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a class="text-white" href="{{route('admin.city.show', $city->id)}}"><button type="button" class="btn btn-primary">View Orders</button></a>
                        <form action="{{ route('admin.city.destroy', $city->id) }}", method="POST" onclick="return confirm('Are you sure you want to delete this city?');">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger text-white close-button"><i class="fa">&#x2715</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        {{ $cities->links() }}
    </div>
</div>

@endsection
@section('extra-script')
@endsection