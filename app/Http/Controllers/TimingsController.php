<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repo\Restaurants\RestaurantRepositoryInterface;

use Response;

class TimingsController extends Controller {

	protected $restaurant;

	public function __construct(RestaurantRepositoryInterface $restaurant) {
		$this->restaurant = $restaurant;
	}

	public function getTimings($restaurantId) {

		$restaurant = $this->restaurant->find($restaurantId);

		return Response::json(['data' => $restaurant->timings->toArray()]);

		//dd( $restaurant->timings->toArray() );

	}

}
