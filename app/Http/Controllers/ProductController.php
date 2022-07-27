<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }

    public function addToCart(Product $product){
        $order = Order::where('user_id', auth()->user()->id)->where('checkout', false)->firstOrCreate(['user_id'=> auth()->user()->id]);
        $order->amount += $product->price;
        $order->save();

        $cart = Cart::where('order_id', $order->id)->where('product_id', $product->id)->firstOrCreate(['order_id'=> $order->id, 'product_id'=> $product->id]);
        $cart->quantity +=1;
        $cart->save();

        return back();
    }
}
