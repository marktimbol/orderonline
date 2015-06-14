<?php namespace App\Composers;

use App\Repo\Cuisines\CuisineRepositoryInterface;
use App\Repo\Countries\CountryRepositoryInterface;
use Auth;

class RestaurantComposer {

	protected $cuisine;
	protected $countries;

	public function __construct( CuisineRepositoryInterface $cuisine, CountryRepositoryInterface $countries ) {
		$this->cuisine = $cuisine;
		$this->countries = $countries;
	}

	/**
	 * [compose share cuisines & countries varialbles to a certain view]
	 * @param  [type] $view [description]
	 * @return [type]       [description]
	 */
    public function compose($view)
    {

    	$cuisines = array();
		$allCuisines = $this->cuisine->all();
		$cuisines[''] = '';
		
		foreach( $allCuisines as $cuisine ) {
			$cuisines[$cuisine->id] = $cuisine->cuisine;
		}	

        $view->with('cuisines', $cuisines );

        /*=========================*/

    	$countries = array();
		$allCountries = $this->countries->all();
		$countries[''] = '';
		
		foreach( $allCountries as $country ) {
			$countries[$country->countryCode] = $country->name;
		}	

        $view->with('countries', $countries );

        $view->with('currentUser', Auth::user() ?: 'guest');        
    }

}