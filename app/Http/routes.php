<?php

/**
 * Todo: Update Timings table
 */

use App\Restaurant;
use App\Timings;

Route::get('test', function() {

		$defaultTimings = array(
			['day' => 'Sunday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Monday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Tuesday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Wednesday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Thursday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Friday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Saturday', 'open' => '', 'close' => '', 'dayoff' => '']

		);
});


Route::get('schedule/{id}', function($id) {

	$restaurant = Restaurant::findOrFail($id);
	$timings = $restaurant->timings->toArray();

	dd($timings);

	foreach( $timings as $key => $value ) {
		if( $key == 'schedule' ) {
			foreach( json_decode($value) as $schedule ) {
				echo $schedule->day . '<br />' . $schedule->open . '<br />' . $schedule->close . '<br />' . $schedule->dayoff .  '<hr />';
			}
		}
	}

});

Route::get('currency', function() {
	return array(
	    'AFA' => 'Afghan Afghani',
	    'AWG' => 'Aruban Florin',
	    'AUD' => 'Australian Dollars',
	    'ARS' => 'Argentine Pes',
	    'AZN' => 'Azerbaijanian Manat',
	    'BSD' => 'Bahamian Dollar',
	    'BDT' => 'Bangladeshi Taka',
	    'BBD' => 'Barbados Dollar',
	    'BYR' => 'Belarussian Rouble',
	    'BOB' => 'Bolivian Boliviano',
	    'BRL' => 'Brazilian Real',
	    'GBP' => 'British Pounds Sterling',
	    'BGN' => 'Bulgarian Lev',
	    'KHR' => 'Cambodia Riel',
	    'CAD' => 'Canadian Dollars',
	    'KYD' => 'Cayman Islands Dollar',
	    'CLP' => 'Chilean Peso',
	    'CNY' => 'Chinese Renminbi Yuan',
	    'COP' => 'Colombian Peso',
	    'CRC' => 'Costa Rican Colon',
	    'HRK' => 'Croatia Kuna',
	    'CPY' => 'Cypriot Pounds',
	    'CZK' => 'Czech Koruna',
	    'DKK' => 'Danish Krone',
	    'DOP' => 'Dominican Republic Peso',
	    'XCD' => 'East Caribbean Dollar',
	    'EGP' => 'Egyptian Pound',
	    'ERN' => 'Eritrean Nakfa',
	    'EEK' => 'Estonia Kroon',
	    'EUR' => 'Euro',
	    'GEL' => 'Georgian Lari',
	    'GHC' => 'Ghana Cedi',
	    'GIP' => 'Gibraltar Pound',
	    'GTQ' => 'Guatemala Quetzal',
	    'HNL' => 'Honduras Lempira',
	    'HKD' => 'Hong Kong Dollars',
	    'HUF' => 'Hungary Forint',
	    'ISK' => 'Icelandic Krona',
	    'INR' => 'Indian Rupee',
	    'IDR' => 'Indonesia Rupiah',
	    'ILS' => 'Israel Shekel',
	    'JMD' => 'Jamaican Dollar',
	    'JPY' => 'Japanese yen',
	    'KZT' => 'Kazakhstan Tenge',
	    'KES' => 'Kenyan Shilling',
	    'KWD' => 'Kuwaiti Dinar',
	    'LVL' => 'Latvia Lat',
	    'LBP' => 'Lebanese Pound',
	    'LTL' => 'Lithuania Litas',
	    'MOP' => 'Macau Pataca',
	    'MKD' => 'Macedonian Denar',
	    'MGA' => 'Malagascy Ariary',
	    'MYR' => 'Malaysian Ringgit',
	    'MTL' => 'Maltese Lira',
	    'BAM' => 'Marka',
	    'MUR' => 'Mauritius Rupee',
	    'MXN' => 'Mexican Pesos',
	    'MZM' => 'Mozambique Metical',
	    'NPR' => 'Nepalese Rupee',
	    'ANG' => 'Netherlands Antilles Guilder',
	    'TWD' => 'New Taiwanese Dollars',
	    'NZD' => 'New Zealand Dollars',
	    'NIO' => 'Nicaragua Cordoba',
	    'NGN' => 'Nigeria Naira',
	    'KPW' => 'North Korean Won',
	    'NOK' => 'Norwegian Krone',
	    'OMR' => 'Omani Riyal',
	    'PKR' => 'Pakistani Rupee',
	    'PYG' => 'Paraguay Guarani',
	    'PEN' => 'Peru New Sol',
	    'PHP' => 'Philippine Pesos',
	    'QAR' => 'Qatari Riyal',
	    'RON' => 'Romanian New Leu',
	    'RUB' => 'Russian Federation Ruble',
	    'SAR' => 'Saudi Riyal',
	    'CSD' => 'Serbian Dinar',
	    'SCR' => 'Seychelles Rupee',
	    'SGD' => 'Singapore Dollars',
	    'SKK' => 'Slovak Koruna',
	    'SIT' => 'Slovenia Tolar',
	    'ZAR' => 'South African Rand',
	    'KRW' => 'South Korean Won',
	    'LKR' => 'Sri Lankan Rupee',
	    'SRD' => 'Surinam Dollar',
	    'SEK' => 'Swedish Krona',
	    'CHF' => 'Swiss Francs',
	    'TZS' => 'Tanzanian Shilling',
	    'THB' => 'Thai Baht',
	    'TTD' => 'Trinidad and Tobago Dollar',
	    'TRY' => 'Turkish New Lira',
	    'AED' => 'UAE Dirham',
	    'USD' => 'US Dollars',
	    'UGX' => 'Ugandian Shilling',
	    'UAH' => 'Ukraine Hryvna',
	    'UYU' => 'Uruguayan Peso',
	    'UZS' => 'Uzbekistani Som',
	    'VEB' => 'Venezuela Bolivar',
	    'VND' => 'Vietnam Dong',
	    'AMK' => 'Zambian Kwacha',
	    'ZWD' => 'Zimbabwe Dollar'
	);
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
	Route::get('restaurants/{id}/timings', 'TimingsController@getTimings');

	Route::resource('users', 'UsersController', ['only' => ['show','edit','update']]);
	

});



