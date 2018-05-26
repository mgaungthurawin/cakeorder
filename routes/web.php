<?php

Route::get('/', 'WelcomeController@index');
Route::get('/cake/{id}', 'CakeController@cakedetail');

Route::get('/order', 'CakeController@order');
Route::post('/order', ['as' => 'cakeorder', 'uses' => 'CakeController@postOrder']);
Route::get('/cart', 'CartController@getCart');
Route::post('/cart', 'CartController@postCart');
Route::post('/removecart', 'CartController@removeCart');
Route::get('/fbkit/verify', 'FbKitController@index');

Route::get('/phone', 'DashboardController@index');
Route::post('/phone', 'DashboardController@postPhone')->name('phone');

Route::group(['middleware' => 'Dashboard'], function () {
	Route::get('/dashboard', 'DashboardController@dashboard');
});



Auth::routes();


Route::group(['middleware' => 'Admin'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('category', 'Admin\CategoryController');
	Route::resource('product', 'Admin\ProductController');
	Route::get('customer', 'Admin\CustomerController@index');
	Route::resource('orderlist', 'Admin\OrderController');
});

