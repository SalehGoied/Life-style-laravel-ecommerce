<?php

namespace App\Http\Controllers;

use App\Cart;
use App\City;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCart(){
        $order = Order::where('user_id', auth()->user()->id)->where('checkout', false)->first();
        return view('product.cart', compact('order'));
    }

    public function deleteItem(Cart $cart){
        // dd($cart);
        $order = Order::where('id', $cart->order->id)->first();
        $order->amount -= ($cart->product->price*$cart->quantity);
        $order->save();

        $cart->delete();
        if(! $order->carts->count()){
            $order->delete();
        }
        
        return back();
    }

    public function changeQuantity(Cart $cart, Request $req){

        $order = Order::where('id', $cart->order_id)->first();
        $order->amount -= ($cart->product->price*$cart->quantity);
        $order->save();

        $cart->quantity = $req->quantity;
        $cart->save();

        $order->amount += ($cart->product->price*$cart->quantity);
        $order->save();

        

        return response(['item'=> $cart, 'price' => $cart->product->price]);
    }

    public function checkout(){
        $order = auth()->user()->orders->where('checkout', false)->first();
        // dd($order);
        if ($order == null){
            return back();
        }
        $cities = City::all();
        // dd($order->carts);
        return view('product.checkout', compact('order', 'cities'));
    }

    public function submitcheckout(Request $req){
        // dd($req);
        $data = $req->validate([
            'first_name'=> 'required' ,
            'last_name'=> 'required' ,
            'phone'=> 'required' ,
            'email' => 'nullable|email',
            'address'=> 'required' ,
            'address2' => 'nullable',
            'city_name'=> 'required' ,
        ]);
        // dd( auth()->user()->orders);
        $order = auth()->user()->orders->where('checkout', 0)->first();
        $order->update($data);
        $city = City::find($data['city_name']);
        $order->checkout = true;
        $order->shipping = $city->price;
        $order->total = $order->amount + $city->price; //don't forget the shipping
        $order->city_name = $city->name;
        $order->save();

        return redirect(route('products.index'))->with('success','order created successfully!');
    }
}
