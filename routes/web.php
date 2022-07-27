<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/admin/login', 'AdminController@login')->name('admin.login');
// Route::post('/admin/loginsubmit', 'AdminController@loginsubmit')->name('admin.loginsubmit');
Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace'=> 'admin', 'as' => 'admin.'], function () {
    
    // index
    Route::get('/', 'AdminController@index')->name('index');

    // users
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/users/{user}/orders', 'UserController@orders')->name('users.orders');


    // products
    Route::get('/products', 'AdminController@products')->name('products');
    Route::get('/products/add', 'AdminController@addproducts')->name('products.add');
    Route::post('/products/store', 'AdminController@storeproduct')->name('products.store');
    Route::get('/products/{product}/edit', 'AdminController@editproduct')->name('products.edit');
    Route::put('/products/{product}/update', 'AdminController@updateproduct')->name('products.update');
    Route::get('/products/{product}/delete', 'AdminController@deleteproduct')->name('products.delete');

    Route::get('/orders', 'OrderConttroller@index')->name('orders');
    Route::get('/orsers/{order}', 'OrderConttroller@show')->name('orders.show');
    Route::get('/order/{order}/toggleDeliver', 'OrderConttroller@toggleDeliver')->name('orders.toggleDeliver');
    Route::get('/order/{order}/delete', 'OrderConttroller@delete')->name('orders.delete');

    Route::resource('city', 'CityController');
});


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', 'HomeController@welcome')->name('welcome');
// profile route 
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/orders', 'ProfileController@orders')->name('profile.orders');
Route::get('/orders/{order}', 'ProfileController@showOrder')->name('profile.orders.show');
Route::post('/orders/{order}/rate', 'ProfileController@rateOrder')->name('profile.orders.rate');


Route::get('/cart', 'OrderController@showCart')->name('order.showCart')->middleware('auth');
Route::get('/cart/{cart}/deleteItem', 'OrderController@deleteItem')->name('order.deleteItem')->middleware('auth');
Route::get('/cart/{cart}/changeQuantity', 'OrderController@changeQuantity')->name('order.changeQuantity')->middleware('auth');
Route::get('/checkout', 'OrderController@checkout')->name('order.checkout')->middleware('auth');
Route::post('/submitcheckout', 'OrderController@submitcheckout')->name('order.submitcheckout')->middleware('auth');


Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/products/{product}/add-to-cart', 'ProductController@addToCart')->name('products.addToCart')->middleware('auth');

