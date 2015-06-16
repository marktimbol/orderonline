<?php namespace App\Repo\Timings;

use App\Repo\Timings\TimingRepositoryInterface;
use App\Timing;
use App\Restaurant;

class TimingRepository implements TimingRepositoryInterface {
	
	public function find($restaurantId) {
		return Restaurant::findOrFail($restaurantId);
	}

	public function store($restaurantId, $data) {

		$restaurant = $this->find($restaurantId);
		
		$restaurant->timings()->create([
			'schedule' => json_encode($data)
			]);
	}

	public function update($restaurantId, $timings) {

		$restaurant = $this->find($restaurantId);
		
		$restaurant->timings()->update([
			'schedule' => json_encode($timings)
			]);
	}
}