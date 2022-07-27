<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $orders = Order::('user_id', auth()->user()->id)->where('checkout', '!=', 0)->latest()->take(3)->get();
        return view('home');
    }

    public function welcome()
    {
        $products = Product::latest()->take(6)->get();
        return view('welcome', compact('products'));
    }
}
