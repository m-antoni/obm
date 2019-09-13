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

Route::post('/user-logout', 'Auth\LoginController@userLogout')->name('userlogout');
// UNCOMMENT IF REFFERAL WILL CATCH FROM URL
// Route::get('register/{ref?}','Auth\RegisterController@showRegistrationForm');

// SMS Verification Code OPT Routes
Route::get('smsverify', 'VerifyOTPController@show_verify')->name('verify.sms');
Route::post('smsverify', 'VerifyOTPController@verifyOTP')->name('verify.otp');
Route::get('smsverify/resend', 'VerifyOTPController@resend')->name('resend');
Route::get('sms', 'VerifyOTPController@test'); // testing

// Forgot Password SMS Sending
Route::get('password/sms', 'VerifyOTPController@forgotPasswordOTP')->name('forgot.password');
Route::post('password/sms', 'VerifyOTPController@forgotPasswordVerify')->name('forgot.verify.otp');
Route::get('password/sms/resend', 'VerifyOTPController@resendPasswordOTP')->name('resend.password.otp');
Route::post('password/sms/redirect', 'VerifyOTPController@verifyOTPPassword')->name('verify.otp.password');
Route::get('password/sms/reset', 'VerifyOTPController@showForgotPasswordReset')->name('show.forgotpass.reset');
Route::post('password/sms/reset', 'VerifyOTPController@ForgotPasswordReset')->name('forgotpass.reset');

// Dynamic Address Fetching
Route::post('/register/fetch', 'Auth\RegisterController@fetch')->name('dynamic.address.fetch');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');


Route::group(['prefix' => 'home', 'middleware' => ['auth', 'isverified','web']],function(){
	// navigation
	Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

	// User Profile Routes
	Route::get('/user', 'ClientsController@index')->name('user');
	Route::post('/user', 'ClientsController@upload_image')->name('upload.image');
	Route::post('/user/send', 'ClientsController@referral_send')->name('referral.send');

	// Order History
	Route::get('products/list-orders', 'ProductsController@list_orders')->name('list.orders');
	Route::get('product/{product}', 'ProductsController@single_product')->name('single.product');
	Route::get('product/invoice/show/{id}', 'ProductsController@generate_invoice')->name('generate.invoice');

	// Products Gallery
	Route::get('/shop', 'ProductsController@index')->name('shop')->middleware('auth');
	Route::get('products/appliances/', 'ProductsController@appliances')->name('appliances');
	Route::get('products/wines/', 'ProductsController@wines')->name('wines');
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

	// GROCERIES
	Route::get('grocery', 'GroceryController@index')->name('grocery');
	Route::get('grocery/rice', 'GroceryController@rice')->name('rice');
	Route::get('grocery/remove/{id}', 'GroceryController@delete_item')->name('delete.grocery');
	Route::get('grocery/add-to-cart/{id}', 'GroceryController@add_to_cart')->name('add.grocery');
	Route::get('grocery/shopping-cart/', 'GroceryController@shopping_cart')->name('shopping.grocery');

	// Cash On Delivery
	Route::get('products/checkout-cod', 'ProductsController@checkout_cod')->name('cod');
	Route::post('products/checkout-cod', 'ProductsController@cod_store')->name('cod.store');

	// Bills and Payment
	Route::get('bills-payment', 'BillsPaymentController@index')->name('bills'); // index
	Route::post('bills-payment', 'BillsPaymentController@store')->name('bills.store');
	Route::get('bills-payment/history', 'BillsPaymentController@history')->name('bills.history');
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
	// Route::get('/chats/csr','MessagesController@fetchCSR')->name('fetchCSR');
	
	// E-Loading Routes
	Route::get('/load','EloadController@index')->name('load');
	Route::get('/load/{eload}/form','EloadController@form')->name('load.form');
	Route::post('/load/form/post','EloadController@post')->name('load.post');
	Route::get('/load/globe','EloadController@globe')->name('globe');
	Route::get('/load/smart','EloadController@smart')->name('smart');
	Route::get('/load/sun','EloadController@sun')->name('sun');
	Route::get('/load/tnt','EloadController@tnt')->name('tnt');
	Route::get('/load/tm','EloadController@tm')->name('tm');
	Route::get('/load/cherry','EloadController@cherry')->name('cherry');
	Route::get('/load/cignal','EloadController@cignal')->name('cignal');
	Route::get('/load/pldt','EloadController@pldt')->name('pldt');
	Route::get('/load/steam','EloadController@steam')->name('steam');
	
	// Games Routes
	Route::get('/games','GamesController@index')->name('games');
	Route::get('/games/quiz','GamesController@quiz')->name('games.quiz');
	
	// Ebooks Routes
	Route::get('/ebooks', 'EbooksController@index')->name('ebooks');
	Route::get('/ebooks/pinoy', 'EbooksController@pinoy')->name('pinoy');
});


// Route::get('/test/{ref?}', function($ref = null){
// 		dd(md5(uniqid(rand(), true)));
// 		return view('test', compact('ref'));
// });

// Route::post('/test',function(Request $request){

// 		return dd($request->all());
// });


