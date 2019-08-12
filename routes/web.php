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


Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'verified']],function(){
		// navigation
		Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
		Route::get('/shop', 'ProductsController@index')->name('shop')->middleware('auth');

		// Order History
		Route::get('products/list-orders', 'ProductsController@list_orders')->name('list.orders');
		Route::get('product/{product}', 'ProductsController@single_product')->name('single.product');
		Route::get('product/invoice/show/{id}', 'ProductsController@generate_invoice')->name('generate.invoice');

		// Products Gallery
		Route::get('products/appliances/', 'ProductsController@appliances')->name('appliances');
		Route::get('products/kitchenware/', 'ProductsController@kitchenware')->name('kitchenware');

		// Add To Cart Routes
		Route::get('products/remove/{id}', 'ProductsController@delete_item')->name('delete.cart');
		Route::get('products/add-to-cart/{id}', 'ProductsController@add_to_cart')->name('add.cart');
		Route::get('products/shopping-cart/', 'ProductsController@shopping_cart')->name('shopping.cart');

		// Cash On Delivery
		Route::get('products/checkout-cod', 'ProductsController@checkout_cod')->name('checkout.cod');
		Route::post('products/checkout-cod', 'ProductsController@cod_store')->name('cod.store');
		Route::post('products/checkout-cod/add-details', 'DetailsController@add_details')->name('add.details');
		Route::post('products/checkout-cod/update-details', 'DetailsController@update_details')->name('update.details');

		// Pay on Bank Routes
		Route::get('products/checkout-payonbank', 'ProductsController@checkout_payonbank')->name('checkout.payonbank');
		Route::post('products/checkout-payonbank', 'ProductsController@payonbank_store')->name('payonbank.store');
		Route::post('products/checkout-payonbank/add-details', 'DetailsController@add_details_bank')->name('add.details.bank');
		Route::post('products/checkout-payonbank/update-details', 'DetailsController@update_details_bank')->name('update.details.bank');
		Route::get('products/confirm-order', 'ProductsController@confirm_order')->name('confirm.order');
		// Upload Receipts
		Route::post('products/confirm-order', 'UploadReceiptsController@upload_receipt')->name('upload.receipt');
		Route::post('products/list-orders/upload', 'UploadReceiptsController@client_receipt')->name('upload.receipt.clientarea');

		// Client Area
		Route::get('client/', 'ClientsAreaController@index')->name('client');
		Route::get('client/user-profile', 'ClientsAreaController@user_profile')->name('user.profile');
		Route::post('client/user-profile/upload-image', 'ClientsAreaController@upload_image')->name('upload.image');


		// Beem Bucks Routes
		// Route::get('create_beem/','BeemBucksController@create')->name('create_beem');
		// Route::post('create_beem/','BeemBucksController@store')->name('store_beem');
		// Route::get('ewallet','BeemBucksController@ewallet')->name('ewallet');
		// Route::post('ewallet','BeemBucksController@ewallet_store')->name('ewallet.store');
		// Route::put('ewallet/{id}','BeemBucksController@ewallet_update')->name('ewallet.update');
		// Route::delete('ewallet/{card}', 'BeemBucksController@card_destroy')->name('card.destroy');
});


// Send To Email Routes
// Route::get('send', 'MailController@send')->name('send.email');

// Paypal Routes
// Route::get('/home/products/paypal/{product}', 'PaypalController@index')->name('paypal');
// Route::post('/home/products/paypal/checkout', 'PaypalController@createPayment')->name('create-paypal');
// Route::get('/home/products/paypal/confirm', 'PaypalController@confirmPayment')->name('confirm-paypal');

// Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary');
// ProductsConstroller
//Route::get('/home/product/{product}', 'ProductsController@single_product')->name('single.product');