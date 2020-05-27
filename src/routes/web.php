<?php

Route::group([
	'namespace' => 'PixelPenguin\PixelWebsite\Http\Controllers',
	'middleware' => ['web']
], function(){
	
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	//Route::get('demo', 'DemoController@index');
	
	Route::get('/product/{linkName}', 'ProductController@index');
	Route::get('/products/{categoryId?}/{orderBy?}', 'ProductController@directory');
	
	Route::get('/cart/view', 'CartController@viewCart');
	Route::get('/checkout', 'CartController@viewCheckout');
	Route::get('/contact-us', 'ContactController@index');
	
	
    Route::get('/page/{linkName}', 'PageController@index')->name('pageView');
	//Route::post('add-to-cart', 'CartController@addToCart');
	
	Route::get('/json/products/get/{categoryId?}/{take?}/{skip?}/{orderBy?}/{orderType?}', 'ProductController@jsonDirectory');
});

Route::group([
	'namespace' => 'PixelPenguin\PixelWebsite\Http\Controllers',
	'middleware' => ['web'],
    'prefix'     	=> 	'cart',
], function(){
	
	Route::post('add', 'CartController@addToCart');
	Route::post('update', 'CartController@updateCart');
	Route::get('get', 'CartController@getCart');
	Route::post('remove', 'CartController@removeItemCompletely');
	
	Route::post('clear', 'CartController@clearCart');
});


