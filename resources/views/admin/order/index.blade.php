@extends('admin.partials.app')

@section('content')

    <div class="container w-100 pb-5">
        <h1>Orders</h1>
        <table class="table table-bordered table-hover w-100">
            <caption>List of orders<span class="d-flex">Total: {{ $orders->count() }} {{ $orders->count() == 1? 'order': 'orders' }}</span></caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Amount</th>
                <th scope="col">City</th>
                <th scope="col">Shipping</th>
                <th scope="col">Total</th>
                <th scope="col">Stutes</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->index +1}}</th>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->amount }}</td>
                        <td>{{ $order->city_name }}</td>
                    <td>{{ $order->shipping }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->checkout == 1? 'undelivered': 'delivered' }}</td>
                    
                    <td>
                    <a class="text-white" href="{{route('admin.orders.show', $order->id)}}"><button type="button" class="btn btn-primary">Veiw</button></a>
                    <a class="text-white" href="{{ route('admin.orders.delete', $order->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="btn btn-danger text-white close-button"><i class="fa">&#x2715</i></button>
                    </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        {{ $orders->links() }}
    </div>

@endsection
@section('extra-script')
@endsection