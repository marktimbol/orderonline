<?php namespace App\Composers;

use App\Repo\Cuisines\CuisineRepositoryInterface;
use Auth;

class RestaurantComposer {

	protected $cuisine;

	public function __construct( CuisineRepositoryInterface $cuisine) {
		$this->cuisine = $cuisine;
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

  //   	$countries = array();
		// $allCountries = $this->countries->all();
		// $countries[''] = '';
		
		// foreach( $allCountries as $country ) {
		// 	$countries[$country->countryCode] = $country->name;
		// }	

		$timeRange = hoursRange( 0, 86400, 60 * 15 );

        $view->with('timeRange', $timeRange);

        $view->with('currentUser', Auth::user() ?: 'guest');        
    }

}