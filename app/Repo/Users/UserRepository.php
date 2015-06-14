<?php namespace App\Repo\Users;

use App\Repo\Users\UserRepositoryInterface;
use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\User;
use App\Restaurant;
use Auth;

class UserRepository implements UserRepositoryInterface {
	
	public function find( $userId ) {
		return User::findOrFail( $userId );
	}
	
	public function store( $data ) {
		return User::create( $data );
	}

	public function owns($restaurant) {

		$result = Restaurant::where('id', $restaurant->id)
					->where('user_id', Auth::user()->id)
					->first();

		return $result ? true : false;

	}
}