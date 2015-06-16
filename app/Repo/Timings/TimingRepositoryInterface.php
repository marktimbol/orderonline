<?php namespace App\Repo\Timings;

interface TimingRepositoryInterface {
	
	public function find($restaurantId);

	public function store($restaurantId, $data);

	public function update($restaurantId, $data);
}