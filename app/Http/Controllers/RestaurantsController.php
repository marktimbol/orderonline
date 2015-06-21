<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Response;
use Laracasts\Flash\Flash;

//Requests
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

//Commands
use App\Commands\CreateRestaurantCommand;
use App\Commands\UpdateRestaurantCommand;

//Repo
use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Users\UserRepositoryInterface;

use Auth;

class RestaurantsController extends Controller {

	protected $restaurant;
	protected $user;

	public function __construct( RestaurantRepositoryInterface $restaurant, UserRepositoryInterface $user ) {
		$this->restaurant = $restaurant;
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userRestaurants = Auth::user()->restaurant()->get();
		
		return view('dashboard.restaurants.index', compact('userRestaurants'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Show the form to add new restaurant
	 */
	public function createRestaurant() {

		return view('pages.restaurants.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( )
	{


	}

	/**
	 * Store the newly created restaurant
	 * @return [type] [description]
	 */
	public function storeRestaurant( CreateRestaurantRequest $request) {

		$this->dispatchFrom( CreateRestaurantCommand::class, $request );

		Flash::success('Thank you for registering your restaurant with us.');

		return redirect()->route('dashboard.restaurants.index');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $restaurantId )
	{
		$restaurant = $this->restaurant->find( $restaurantId );
		
		//dd( $restaurant->toArray() );

		if( $this->user->owns($restaurant) ) {

			return view('dashboard.restaurants.edit', compact('restaurant'));
		
		}
		
		return view('dashboard.forbidden');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( UpdateRestaurantRequest $request )
	{

		$this->dispatchFrom( UpdateRestaurantCommand::class, $request );

		if( $request->hasFile('logo') ) {
			
		}

		Flash::success('Restaurant information was updated.');

		return redirect()->route('dashboard.restaurants.edit',$request->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
