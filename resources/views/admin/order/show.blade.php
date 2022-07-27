@extends('admin.partials.app')

@section('content')
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

            <tr>
                <th>Action</th>
                <td>
                    <a class="text-white" href="{{route('admin.orders.toggleDeliver', $order->id)}}">
                        <button id="deliver-{{$order->id}}" class="btn {{ $order->checkout == 1? 'btn-primary': 'btn-success' }} text-white close-button">{{ $order->checkout == 1? 'Delivered': 'Undelivered' }}</button>
                    </a>
                        <a class="text-white" href="{{ route('admin.orders.delete', $order->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="btn btn-danger text-white close-button"><i class="fa">&#x2715</i></button>
                    </a>
                </td>
            </tr>
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
@endsection
@section('extra-script')
<script type="application/javascript">

    // function toggleDeliver(order_id){
    //     console.log(order_id);
    //     var element =  document.getElementById('deliver-'+order_id);
    //     console.log(element);
    //     $.ajax({

    //         url : order_id +'/toggleDeliver',
    //         type : 'GET',
    //         data : {},
    //         success : function(order) {
    //             console.log('Data: '+order);
    //             element.classList.toggle("btn-primary");
    //             element.classList.toggle("btn-success");
    //             let deliver = document.getElementById('delivered');
    //             if (order.checkeout == 1){
    //                 element.innerHTML = Undelivered;
    //                 deliver.innerHTML = Delivered;
    //             }else {
    //                 element.innerHTML = Delivered;
    //                 deliver.innerHTML = Undelivered;
    //             }
    //         },
    //         error : function(request,error)
    //         {
    //             console.log("Request: "+JSON.stringify(request));
    //         }
    //     });
    // }
</script>
@endsection