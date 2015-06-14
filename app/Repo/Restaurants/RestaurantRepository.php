<?php namespace App\Repo\Restaurants;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Restaurant;

class RestaurantRepository implements RestaurantRepositoryInterface {
	
	public function all() {
		return Restaurant::all();
	}
	
	public function find($id) {
		return Restaurant::with('cuisines')->findOrFail( $id );
	}
	
	public function store($data) {
		return Restaurant::create( $data );
	}

	public function update($id, $data) {
		$restaurant = $this->find($id);
		$restaurant->fill($data);
		$restaurant->save();

		return $restaurant;
	}
}