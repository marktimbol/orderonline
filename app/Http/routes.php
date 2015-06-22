<?php

/**
 * Todo: Fix Creating Restaurant; Apply single responsibility principle
 */

use App\Restaurant;
use App\Timings;


Route::get('time-range', function() {
  $timings = hoursRange( 0, 86400, 60 * 15 );
  return Response::json(['data' => $timings]);
});


Route::get('restaurant-timings/{id}', function($id) {
	$restaurant = Restaurant::findOrFail($id);
	return Response::json(['data' => $restaurant->timings->toArray()]);
});

Route::get('countries', 'CountriesController@index');

Route::group( ['prefix' => 'api/v1'], function() {
	
});

/* ============ register ==========*/
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'AuthController@getRegister']);
Route::post('auth/register', 'AuthController@postRegister');	

/* ============ login ==========*/
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);

/* ============ logout ==========*/
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);


/**
 * Unauthorized access
 */
Route::get('unauthorized', function() {
  return view('pages.unauthorized');
});

View::composer( [
			'pages.restaurants.create',
			'pages.restaurants.edit',
			'dashboard.restaurants.edit',
		], 'App\Composers\RestaurantComposer');

Route::get('add-restaurant', ['as' => 'restaurant.add', 'uses' => 'RestaurantsController@createRestaurant']);
Route::post('add-restaurant',['as' => 'restaurant.store', 'uses' => 'RestaurantsController@storeRestaurant']);

Route::get('user', function() {
	return Auth::user();
});

Route::group( ['prefix' => 'dashboard', 'middleware' => 'auth'], function() {

	Route::get('/', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);
	Route::get('forbidden', ['as' => 'forbidden', 'uses' => 'PagesController@forbidden']);

	Route::resource('restaurants', 'RestaurantsController');
	Route::get('restaurants/{id}/timings', 'TimingsController@getTimings');

	Route::resource('users', 'UsersController', ['only' => ['show','edit','update']]);
	

});



