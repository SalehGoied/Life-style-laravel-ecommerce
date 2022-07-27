@extends('admin.partials.app')

@section('content')
  <div class="container w-100 pt-5">
    <h1>Users</h1>
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
            <td><a href="{{ route('admin.users.orders', $user->id) }}"><button class="btn btn-primary">View All Orders</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
@section('extra-js')
@endsection