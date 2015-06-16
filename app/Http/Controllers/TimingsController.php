<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Restaurant;

use Response;

class TimingsController extends Controller {

	public function getTimings($restaurantId) {

		$restaurant = Restaurant::findOrFail($restaurantId);

		return Response::json(['data' => $restaurant->timings->toArray()]);

		//dd( $restaurant->timings->toArray() );

	}

}
