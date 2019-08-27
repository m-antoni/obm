<?php

use Illuminate\Http\Request;
use App\Product;

// Landing Page
Route::get('/', function () {	
    return view('welcome');
})->name('homepage');

// Users Routes 
Auth::routes();
//set to send verify link must be after auth routes
Auth::routes(['isverified' => true]);

Route::get('register/{ref?}','Auth\RegisterController@showRegistrationForm');

// SMS Verification Code OPT Routes
Route::get('smsverify', 'VerifyOTPController@show_verify')->name('verify.sms');
Route::post('smsverify', 'VerifyOTPController@verifyOTP')->name('verify.otp');
Route::get('smsverify/resend', 'VerifyOTPController@resend')->name('resend');
Route::get('sms', 'VerifyOTPController@test'); // testing

// Dynamic Address Fetching
Route::post('/register/fetch', 'Auth\RegisterController@fetch')->name('dynamic.address.fetch');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'isverified','web']],function(){
		// navigation
		Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
		Route::post('/', 'ClientsController@upload_image')->name('upload.image');
		Route::post('/send/referral/link', 'ClientsController@referral_send')->name('referral.send');

		// Order History
		Route::get('products/list-orders', 'ProductsController@list_orders')->name('list.orders');
		Route::get('product/{product}', 'ProductsController@single_product')->name('single.product');
		Route::get('product/invoice/show/{id}', 'ProductsController@generate_invoice')->name('generate.invoice');

		// Products Gallery
		Route::get('/shop', 'ProductsController@index')->name('shop')->middleware('auth');
		Route::get('products/appliances/', 'ProductsController@appliances')->name('appliances');
		Route::get('products/kitchenware/', 'ProductsController@kitchenware')->name('kitchenware');
		Route::get('products/show-all/{category}', 'ProductsController@show_all')->name('show.all');

		// Add To Cart Routes
		Route::get('products/remove/{id}', 'ProductsController@delete_item')->name('delete.cart');
		Route::get('products/add-to-cart/{id}', 'ProductsController@add_to_cart')->name('add.cart');
		Route::get('products/shopping-cart/', 'ProductsController@shopping_cart')->name('shopping.cart');

		// PURCHASE BEEM CREDITS
		Route::get('purchase-credit','CreditsController@show_credits')->name('show.credits');
		Route::post('purchase-credit/purchase','CreditsController@post_credits')->name('post.credits');
		Route::get('purchase-credit/upload','CreditsController@show_receipt')->name('show.receipt');
		Route::post('purchase-credit/upload', 'CreditsController@post_receipt')->name('post.receipt');

		// Beems Checkout
		Route::get('products/checkout', 'ProductsController@checkout')->name('checkout');
		Route::post('products/checkout', 'ProductsController@checkout_store')->name('checkout.store');
		Route::post('products/checkout/add-details', 'DetailsController@add_details')->name('add.details');
		Route::get('products/confirm-order', 'ProductsController@confirm_order')->name('confirm.order');

		// Cash On Delivery
		Route::get('products/checkout-cod', 'ProductsController@checkout_cod')->name('cod');
		Route::post('products/checkout-cod', 'ProductsController@cod_store')->name('cod.store');

		// Bills and Payment
		Route::get('bills-payment', 'BillsPaymentController@index')->name('bills'); // index
		Route::post('bills-payment', 'BillsPaymentController@store')->name('bills.store');
		Route::get('creditcard-loans', 'BillsPaymentController@creditcard_loans')->name('creditcard.loans');
		Route::get('insurance', 'BillsPaymentController@insurance')->name('insurance');
		Route::get('utility', 'BillsPaymentController@utility')->name('utility');
		Route::get('telco', 'BillsPaymentController@telco')->name('telco');
		Route::get('cable', 'BillsPaymentController@cable')->name('cable');
		Route::get('government', 'BillsPaymentController@government')->name('government');
		Route::get('others', 'BillsPaymentController@others')->name('others');

		// Master Debit Card Routes
		Route::get('/card-registration', 'MasterDebitCardController@index')->name('card.register');
		Route::post('/card-registration', 'MasterDebitCardController@store')->name('card.store');

		// Chat Routes
		Route::get('/chats','MessagesController@index')->name('chats');
		Route::post('/chats','MessagesController@sendMessage')->name('sendMessage');
		Route::get('/chats/fetch','MessagesController@fetchMessage')->name('fetchMessage');
		Route::get('/chats/csr','MessagesController@fetchCSR')->name('fetchCSR');
		
		// Games Routes
		Route::get('/games','GamesController@index')->name('games');
		
		// Route::get('/ebooks', 'EbooksController@index')->name('ebooks');

});

Route::get('/test/{ref?}', function($ref = null){
		dd(md5(uniqid(rand(), true)));
		return view('test', compact('ref'));
});

Route::post('/test',function(Request $request){

		return dd($request->all());
});
