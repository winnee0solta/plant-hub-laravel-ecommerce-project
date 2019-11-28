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

Route::get('/', 'FrontendController@homeView');
Route::get('/shop', 'FrontendController@shopView');
Route::get('/about-us', 'FrontendController@aboutusView');
Route::get('/cart', 'FrontendController@cartView');
Route::get('/add-to-cart/{id}', 'FrontendController@addToCart')->middleware('auth');
Route::get('/remove-from-cart/{id}', 'FrontendController@removeFromCart')->middleware('auth');
Route::get('/checkout', 'FrontendController@checkoutView');
Route::post('/checkout', 'FrontendController@checkout');

Route::get('/login', 'SecurityController@loginView')->name('login');
Route::post('/login', 'SecurityController@loginUser');

Route::get('/logout', 'SecurityController@destroy');
Route::get('/register', 'SecurityController@registerView');
Route::post('/register', 'SecurityController@register');

Route::get('/register-admin/{email}/{password}', 'SecurityController@registerAdmin');



Route::get('/dashboard', 'BackendController@index')->middleware('auth');
Route::get('/dashboard/products', 'BackendController@productsIndex')->middleware('auth');
Route::get('/dashboard/products/add', 'BackendController@addproductView')->middleware('auth');
Route::post('/dashboard/products/add', 'BackendController@addproduct')->middleware('auth');
Route::get('/dashboard/product/remove/{id}', 'BackendController@removeProduct')->middleware('auth');

Route::get('/dashboard/product/edit/{id}', 'BackendController@editProductView')->middleware('auth');
Route::post('/dashboard/product/edit/{id}', 'BackendController@editProduct')->middleware('auth');


Route::get('/dashboard/orders', 'BackendController@ordersIndex')->middleware('auth');
Route::get('/dashboard/order/remove/{id}', 'BackendController@orderRemove')->middleware('auth');
