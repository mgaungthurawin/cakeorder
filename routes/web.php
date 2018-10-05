<?php

Route::get('/', 'WelcomeController@index');
Route::get('/about', 'WelcomeController@about');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/cake/{id}', 'CakeController@cakedetail');

// Route::get('/order', 'CakeController@order');
// Route::post('/order', ['as' => 'cakeorder', 'uses' => 'CakeController@postOrder']);
Route::get('/cart', 'CartController@getCart');
Route::post('/cart', 'CartController@postCart');
Route::get('/cartorder', 'CartController@cartOrder');
Route::post('/cartorder', ['as' => 'cartorder', 'uses' => 'CartController@postCartOrder']);
Route::post('/removecart', 'CartController@removeCart');
Route::get('/fbkit/verify', 'FbKitController@index');
Route::get('/getprice/{productid}', 'CakeController@getprice');
Route::get('/getdelivery/{location}', 'CakeController@getdelivery');
Route::get('/cartdelivery/{location}', 'CartController@cartdelivery');

Route::get('/phone', 'DashboardController@index');
Route::post('/phone', 'DashboardController@postPhone')->name('phone');
Route::post('/send', 'MailController@send');

// Route::group(['middleware' => 'Dashboard'], function () {
// 	Route::get('/dashboard', 'DashboardController@dashboard');
// });

Route::get('/test', function () {
	foreach (config('location.location') as $key => $location) {
		echo $location;
		echo '<br/>';
	}
	// var_dump(config('location.location'));
});



Auth::routes();


Route::group(['middleware' => 'Admin'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('category', 'Admin\CategoryController');
	Route::resource('product', 'Admin\ProductController');
	Route::get('customer', 'Admin\CustomerController@index');
	Route::post('/orderfilter', 'Admin\FilterController@orderfilter');
	Route::resource('orderlist', 'Admin\OrderController');
	Route::post('deletecustomer', 'Admin\DeleteCustomerController@delete');
});

