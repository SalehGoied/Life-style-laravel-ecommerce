@extends('layouts.app')

@section('content')
    
        <div class="container py-5 h-100">
            <div class="container w-90 pb-5">
                <h1>Order</h1>
                <table class="table table-bordered w-100">
                    <caption></caption>
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>{{ $order->amount }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $order->city_name }}</td>
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <td>{{ $order->shipping }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th>Address 2</th>
                            <td>{{ $order->address2 }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{ $order->total }}</td>
                        </tr>
                        <tr>
                            <th>stutes</th>
                            <td id="delivered">{{ $order->checkout == 1? 'Undelivered': 'Delivered' }}</td>
                        </tr>
                        @if($order->checkout == 2)
                            <tr>
                                <th>Rate Order</th>
                                <td>
                                    <form id="form-rate" action="{{ route('profile.orders.rate', $order->id) }}" method="POST">
                                        @csrf
                                        <input id="input-rate" onchange="chnageRate({{ $order->id }})" value="{{$order->rating? : 0}}" type="range" name="rating" class="form-range" min="1" max="5" class="w-100" id="customRange2">
                                        @if($order->rating != null)
                                            <label for="range"> <span id="rate-star">{{ $order->rating }}</span> ★</label>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <div class="container w-100 pb-5">
                <h1>Items</h1>
                <table class="table table-bordered table-hover w-100">
                    <caption>{{ $order->carts->count()}} {{ $order->carts->count() == 1? 'item': 'items' }}</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sup Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->carts as $item)
                            <tr>
                                <th scope="row">{{ $loop->index +1}}</th>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>{{ $item->product->price * $item->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
@section('extra-script')
    <script type="application/javascript">
        function chnageRate(id){
            // event.preventDefault();

            console.log('aaa');
            // Get some values from elements on the page:
            var $form =  $("#form-rate");
            console.log($form);
            var rating = $form.find( "input[name='rating']" ).val();
            var url = $form.attr( "action" );
            console.log('rr', rating, url);
            // Send the data using post
            //Ajax Function to send a get request
            $.ajax({
                type: "POST",
                url: url,
                dataType:"json",
                data:{ 'rating': rating, _token: '{{csrf_token()}}'},
                success: function(response){
                    //if request if made successfully then the response represent the data
                    console.log('res', response);
                    $('#rate-star').html(response.rating);
                    // $( "#result" ).empty().append( response );
                },
                error: function(){
                    //if request if made successfully then the response represent the data
                    console.log('err');
                    // $( "#result" ).empty().append( response );
                }
            });
        }
    </script>
@endsection
