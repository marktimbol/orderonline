<?php namespace App\Repo\Countries;

use App\Repo\Countries\CountryRepositoryInterface;
use App\Country;

class CountryRepository implements CountryRepositoryInterface {
	
	public function all() {
		return Country::all(['countryCode','name']);
	}
}