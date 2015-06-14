<?php namespace App\Repo\Cuisines;

use App\Repo\Cuisines\CuisineRepositoryInterface;
use App\Cuisine;

class CuisineRepository implements CuisineRepositoryInterface {
	
	public function all() {
		return Cuisine::all(['id','cuisine']);
	}
}