<?php


/**
 * Todo: Update Timings table
 */



use App\Restaurant;
use App\Timings;

Route::get('schedule', function() {

	$restaurant = Restaurant::findOrFail(21);
	$timings = $restaurant->timings->toArray();

	foreach( $timings as $key => $value ) {
		if( $key == 'schedule' ) {
			foreach( json_decode($value) as $schedule ) {
				echo $schedule->day . '<br />' . $schedule->open . '<br />' . $schedule->close . '<hr />';
			}
		}
	}

});

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
	Route::resource('users', 'UsersController', ['only' => ['show','edit','update']]);
	

});



