<?php namespace App\Repo\Restaurants;

interface RestaurantRepositoryInterface {
	
	public function all();
	
	public function find($id);
	
	public function store($data);

	public function update($id, $data);
}