@extends('admin.partials.app')

@section('content')

  <div class="container w-100 pb-5">
    <h1>Lastet Orders</h1>
    <table class="table table-bordered table-hover w-100">
      <caption>List of orders</caption>
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
              <a class="text-white" href="{{route('admin.orders.show', $order->id)}}">
                <button type="button" class="btn btn-primary">Veiw</button>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="container w-100 pt-5">
    <h1>Lastet Users</h1>
    <table class="table table-bordered table-hover w-100">
      <caption>List of users</caption>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $loop->iteration +1}}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>@mdo</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
@section('extra-js')
@endsection