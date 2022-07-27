@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center hv-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-dark"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                    <h5>{{ Auth::user()->name }}</h5>
                    {{-- <p>Web Designer</p> --}}
                    <a href="#"><i class="text-dark far fa-edit mb-5"></i></a>
                    
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                    <h6>Information</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                        <div class="col-6 mb-0">
                        <h6>Email</h6>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-6 mb-0">
                        <h6>Phone</h6>
                        <p class="text-muted">123 456 789</p>
                        </div>
                    </div>
                    @if (Auth::user()->is_admin)
                        <div class="mb-3">
                            <div class="panel-body">
                                Check admin view:
                                <a class="text-dark" href="{{route('admin.index')}}">Admin View</a>
                            </div>
                        </div>
                    @endif
                    <h6>Latest Orders</h6>
                    <hr class="mt-0 mb-0">
                    <div class="row pt-1">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Time</th>
                                <th scope="col">Stuts</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                
                                    <tr class='clickable-row cursor-pointer' onclick="window.location='{{ route('profile.orders.show', $order->id) }}';">
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $order->updated_at }}</td>
                                            <td>{{ $order->checkout == 1? 'Undelivered': 'Delivered' }}</td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="">
                        @if($orders->count() > 3)
                            <a href="{{ route('profile.orders') }}"><button class="btn btn-primary">View All Orders</button></a>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection
