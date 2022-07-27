@extends('layouts.app')

@section('content')
        <div class="container content">
            
            <!-- Jumbotron Header -->
            @if($order)
                <div class="container bg-white rounded-top mt-5" id="zero-pad">
                        
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10 col-12 pt-3">
                                <div class="d-flex flex-column pt-4">
                                    <div><h5 class="text-uppercase font-weight-normal">shopping bag</h5></div>
                                    <div class="font-weight-normal">{{$order->carts->count() == 1? $order->carts->count() . ' item':$order->carts->count() . ' items' }} </div>
                                </div>
                                <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile" id="heading">
                                    <div class="px-lg-5 mr-lg-5" id="produc">PRODUCTS</div>
                                    <div class="px-lg-5 ml-lg-5" id="prc">PRICE</div>
                                    <div class="px-lg-5 ml-lg-1" id="quantity">QUANTITY</div>
                                    <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
                                </div>
                                @foreach ($order->carts as $cart)
                                    <div class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                                        <div class="d-flex flex-row align-items-center">
                                            <div><img src="../{{ $cart->product->image }}" width="150" height="150" alt="" id="image"></div>
                                            <div class="d-flex flex-column pl-md-3 pl-1">
                                                <div><h4>{{ $cart->product->title }}</h4></div>
                                                {{-- <div >Art.No:<span class="pl-2">091091001</span></div>
                                                <div>Color:<span class="pl-3">White</span></div>
                                                <div>Size:<span class="pl-4"> M</span></div> --}}
                                            </div>                    
                                        </div>
                                        <div class="pl-md-0 pl-1"><b>{{ $cart->product->price }}</b></div>
                                        <div class="pl-md-0 pl-2">
                                            <form id="quantity-form" action="">
                                                <input onChange="quantitychange({{$cart->id}})" data-id="" id="quantity-change-{{$cart->id}}" class="form-control-lg" type="number" value="{{ $cart->quantity }}" data-decimals="0" min="1" max="10" step="1"/>
                                            </form>
                                                {{-- <span class="fa fa-minus-square text-secondary"></span><span class="px-md-3 px-1">{{ $cart->quantity }}</span><span class="fa fa-plus-square text-secondary"></span> --}}
                                        </div>
                                        <div class="pl-md-0 pl-1"><b class="cart-items" id="total-change-{{$cart->id}}">{{ $cart->product->price*$cart->quantity }}</b></div>
                                        <a href="{{ route('order.deleteItem', $cart->id) }}"><div class="close">&times;</div></a>
                                    </div>
                                @endforeach
                    
                            </div>
                        </div>
                        
                </div>
                <div class="container bg-light rounded-bottom py-4" id="zero-pad">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{ route('products.index') }}"><button class="btn btn-sm bg-light border border-dark">CONTINUE SHOPPING</button></a>
                                </div>
                                <div class="px-md-0 px-1" id="footer-font">
                                    <b class="pl-md-4">SUBTOTAL <span id="sub-total" class="pl-md-4">${{ $order->amount }}</span></b>
                                </div>
                                <div>
                                    <button class="btn btn-sm bg-dark text-white px-lg-5 px-3"><a href="{{ route('order.checkout') }}">CONTINUE</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3>You don't have any order</h3>
            @endif
        </div>

@endsection

@section('extra-script')
<script type="application/javascript">

    function quantitychange(data){
        var element =  document.getElementById('quantity-change-'+data) 
        var quantity_val =element.value;
        console.log(data, quantity_val);
        $.ajax({

            url : '/cart/'+data+'/changeQuantity',
            type : 'GET',
            data : {
                'quantity' : quantity_val
            },
            success : function(item) {
                console.log('Data: '+item.price);
                document.getElementById('total-change-'+data).innerHTML = (quantity_val*item.price);
                let items = document.getElementsByClassName("cart-items");
                let sum = 0;
                items2 = Object.values(items);
                items2.forEach(item=>sum +=  parseInt(item.innerHTML));
                console.log(sum);
                document.getElementById('sub-total').innerText = '$'+sum;
            },
            error : function(request,error)
            {
                console.log("Request: "+JSON.stringify(request));
            }
        });
    }
</script>
@endsection