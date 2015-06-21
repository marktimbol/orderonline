<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repo\Countries\CountryRepositoryInterface;

use Response;

class CountriesController extends Controller {

	protected $countries;

	public function __construct( CountryRepositoryInterface $countries ) {
		$this->countries = $countries;
	}

	public function index() {
    	$countries = array();
		$allCountries = $this->countries->all();
		$countries[''] = '';
		
		foreach( $allCountries as $country ) {
			$countries[$country->countryCode] = $country->name;
		}	

		return Response::json(['data' => $countries]);
	}


}
