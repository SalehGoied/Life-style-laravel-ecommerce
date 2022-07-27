<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Image;


class AdminController extends Controller
{

    // public function login(){
    //     return view('admin.login');
    // }

    // public function loginsubmit(Request $req){
    //     $req->validate([
    //         'email'=> 'required|email',
    //         'password'=> 'required',
    //     ]);
    //     dd( Hash::make($req->password)  );
    //     $user = User::where('email', $req->email)->where('password', Hash::make($req->password))->first();
    //     dd($user);
    //     if($user && $user->is_admin == 1){
    //         $req->session()->regenerate();
    //         return redirect('/admin-view');
    //     } 
    //     elseif($user){
    //         $req->session()->regenerate();
    //         return redirect('/')->with('warning', 'you cannot access to admin view');
    //     }
    //     else{
    //         return back()->with('erorr', 'error');
    //     }

    // }

    public function index(Request $request){
        $orders = Order::where('checkout', '>' , 0)->latest()->take(5)->get();
        // dd($data);
        $users = User::latest()->take(5)->get();
        return view('admin.index', compact(['users', 'orders']));
    }

    
    public function products(){
        $products = Product::paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function addproducts(){
        return view('admin.product.add');
    }

    public function storeproduct(Request $request){
        // dd($request);
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'image' => 'required',
        ]);

        if($request->image){
            $file= $request->image;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
            $data['image']= 'img/'.$filename;
        }
        // dd($data);
        Product::create($data);
        return back()->with('success', 'product '.$data['title'].' created successfully');
        // return view('admin.product.store');
    }

    public function editproduct(Product $product){
        return view('admin.product.edit', compact('product'));
    }

    public function updateproduct(Product $product, Request $request){
        // dd($product);
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
        ]);
        // dd($request->image);

        $product->update($data);

        if($request->has('image')){
            
            $file= $request->image;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
            $product->image = 'img/'.$filename;
            $product->save();
        }

        return back()->with('success', 'product '.$data['title'].' update successfully');
        // return view('admin.product.add');
    }

    public function deleteproduct(Product $product)
    {
        $titl = $product->title;
        $product->delete();
        return back()->with('success', 'product '.$titl.' deleted successfully');
    }
}
