<?php

use Illuminate\Http\Request;
use App\Product;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Users Routes 
Auth::routes();
// set to send verify link must be after auth routes
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');

// ProductsConstroller
Route::get('/home/products/', 'ProductsController@products')->name('products');
Route::get('/home/product/{product}', 'ProductsController@single_product')->name('single.product');

// Beem Bucks Routes
Route::get('/home/create_beem/','BeemBucksController@create')->name('create_beem');
Route::post('/home/create_beem/','BeemBucksController@store')->name('store_beem');

// Cash On Delivery
Route::get('/home/products/{product}/cod', 'ProductsController@order_cod')->name('order.cod');
Route::post('/home/products/{product}/cod', 'ProductsController@product_cod')->name('product.cod');

// Pay On Bank
Route::get('/home/product/{create}/bank', 'ProductsController@order_bank')->name('order.bank');
Route::post('/home/product/{product}/bank', 'ProductsController@product_bank')->name('order.bank');

// Paypal Routes
Route::get('/home/products/paypal/{product}', 'PaypalController@index')->name('paypal');
Route::post('/home/products/paypal/checkout', 'PaypalController@createPayment')->name('create-paypal');
Route::get('/home/products/paypal/confirm', 'PaypalController@confirmPayment')->name('confirm-paypal');

Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary');
Route::get('/home/products/show/orders', 'ProductsController@myorders')->name('myorders');

// Pay On Bank
Route::get('/home/payonbank/', 'ProductsController@payonbank')->name('payonbank');