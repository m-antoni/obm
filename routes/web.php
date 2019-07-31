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

// Products Gallery
Route::get('/home/products/appliances/', 'ProductsController@appliances')->name('appliances');
Route::get('/home/products/kitchenware/', 'ProductsController@kitchenware')->name('kitchenware');

// Add to Cart Routes
Route::get('/home/products/list-orders', 'ProductsController@list_orders')->name('list.orders');
Route::get('/home/products/shopping-cart/', 'ProductsController@shopping_cart')->name('shopping.cart');
Route::get('/home/products/remove/{id}', 'ProductsController@delete_item')->name('delete.cart');
Route::get('/home/products/add-to-cart/{id}', 'ProductsController@add_to_cart')->name('add.cart');
Route::get('/home/products/checkout-cod', 'ProductsController@checkout_cod')->name('checkout.cod');
Route::post('/home/products/checkout-cod', 'ProductsController@cod_store')->name('cod.store');
Route::get('/home/products/checkout-payonbank', 'ProductsController@checkout_payonbank')->name('checkout.payonbank');
Route::post('/home/products/checkout-payonbank', 'ProductsController@payonbank_store')->name('payonbank.store');

// Beem Bucks Routes
Route::get('/home/create_beem/','BeemBucksController@create')->name('create_beem');
Route::post('/home/create_beem/','BeemBucksController@store')->name('store_beem');
Route::get('/home/ewallet/','BeemBucksController@ewallet')->name('ewallet');
Route::post('/home/ewallet/','BeemBucksController@ewallet_store')->name('ewallet.store');
Route::put('/home/ewallet/{id}','BeemBucksController@ewallet_update')->name('ewallet.update');
Route::delete('/home/ewallet/{card}', 'BeemBucksController@card_destroy')->name('card.destroy');

// Paypal Routes
// Route::get('/home/products/paypal/{product}', 'PaypalController@index')->name('paypal');
// Route::post('/home/products/paypal/checkout', 'PaypalController@createPayment')->name('create-paypal');
// Route::get('/home/products/paypal/confirm', 'PaypalController@confirmPayment')->name('confirm-paypal');

// Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary');
// ProductsConstroller
//Route::get('/home/product/{product}', 'ProductsController@single_product')->name('single.product');