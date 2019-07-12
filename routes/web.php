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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/home/product/{product}', 'ProductsController@index')->name('product');
Route::get('/home/product/{create}/create', 'ProductsController@product_create')->name('product.create');
Route::post('/home/product/{product}/post', 'ProductsController@product_post')->name('product.post');
Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary');

// Route::get('/home/product/show/{id}/edit', 'ProductsController@edit_summary')->name('edit.summary');
// Route::patch('/home/product/show/{id}', 'ProductsController@update_summary')->name('update.summary');

// Administrator Routes 
Route::prefix('admin')->group(function(){
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.form');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
});

