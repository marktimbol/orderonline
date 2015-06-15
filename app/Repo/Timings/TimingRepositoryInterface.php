<?php namespace App\Repo\Timings;

interface TimingRepositoryInterface {
	
	public function update($restaurantId, $data);
}