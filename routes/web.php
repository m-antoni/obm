<?php
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
use Illuminate\Http\Request;
use App\Product;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Users Routes 
Auth::routes();

// set to send verify link
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
// ProductsConstroller
Route::get('/home/products/', 'ProductsController@products')->name('products')->middleware('auth');
Route::get('/home/product/{product}', 'ProductsController@single_product')->name('single.product')->middleware('auth');
// COD
Route::get('/home/product/{product}/cod', 'ProductsController@order_cod')->name('order.cod')->middleware('auth');
Route::post('/home/product/{product}/cod', 'ProductsController@product_cod')->name('product.cod')->middleware('auth');
// PAY ON BANK
Route::get('/home/product/{create}/bank', 'ProductsController@order_bank')->name('order.bank')->middleware('auth');
Route::post('/home/product/{product}/bank', 'ProductsController@product_bank')->name('product.bank')->middleware('auth');

Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary')->middleware('auth');
Route::get('/home/products/show/orders', 'ProductsController@myorders')->name('myorders')->middleware('auth');


// Pay On Bank
Route::get('/home/payonbank/', 'ProductsController@payonbank')->name('payonbank');

// Route::get('/home/product/show/{id}/edit', 'ProductsController@edit_summary')->name('edit.summary');
// Route::patch('/home/product/show/{id}', 'ProductsController@update_summary')->name('update.summary');

// Administrator Routes 
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.form');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
});

