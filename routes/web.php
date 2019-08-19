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

// SMS Verification Code OPT Routes
Route::get('smsverify', 'VerifyOTPController@show_verify')->name('verify.sms');
Route::post('smsverify', 'VerifyOTPController@verifyOTP')->name('verify.otp');
Route::get('smsverify/resend', 'VerifyOTPController@resend')->name('resend');
// Route::get('sms', 'VerifyOTPController@test'); // testing

// Dynamic Address Fetching
Route::post('/register/fetch', 'Auth\RegisterController@fetch')->name('dynamic.address.fetch');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'isverified','web']],function(){
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
		Route::get('products/show-all/{category}', 'ProductsController@show_all')->name('show.all');

		// Add To Cart Routes
		Route::get('products/remove/{id}', 'ProductsController@delete_item')->name('delete.cart');
		Route::get('products/add-to-cart/{id}', 'ProductsController@add_to_cart')->name('add.cart');
		Route::get('products/shopping-cart/', 'ProductsController@shopping_cart')->name('shopping.cart');

		// Bank Transfer Routes
		Route::get('products/checkout', 'ProductsController@checkout')->name('checkout');
		Route::post('products/checkout', 'ProductsController@checkout_store')->name('checkout.store');
		Route::post('products/checkout/add-details', 'DetailsController@add_details')->name('add.details');
		Route::get('products/confirm-order', 'ProductsController@confirm_order')->name('confirm.order');

		// Beem Credits Routes
		Route::get('purchase-credit','CreditsController@show_credits')->name('show.credits');
		Route::post('purchase-credit/purchase','CreditsController@post_credits')->name('post.credits');
		Route::get('purchase-credit/upload','CreditsController@show_receipt')->name('show.receipt');
		Route::post('purchase-credit/upload', 'CreditsController@post_receipt')->name('post.receipt');

		// Client Area
		Route::get('client/', 'ClientsAreaController@index')->name('client');
		Route::get('client/user-profile', 'ClientsAreaController@user_profile')->name('user.profile');
		Route::post('client/user-profile/upload-image', 'ClientsAreaController@upload_image')->name('upload.image');
		
		// Chat Module Routes
		Route::get('/chat', 'ChatController@index')->name('chat');
		Route::get('/chat/{id}', 'ChatController@show')->name('chat.show');
		Route::post('/chat/getchat/{id}', 'ChatController@getChat')->name('chat.fetch');


		Route::get('/testing', function(){
			return view('sms');
		});

});
