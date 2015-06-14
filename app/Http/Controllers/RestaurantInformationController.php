<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Response;
use Laracasts\Flash\Flash;

//Requests
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRestaurantRequest;

//Commands
use App\Commands\CreateRestaurantCommand;

use Auth;

class RestaurantInformationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(array('name' => 'John Doe', 'state' => 'CA'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pages.restaurants.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( CreateRestaurantRequest $request )
	{

		$this->dispatchFrom( CreateRestaurantCommand::class, $request );

		Flash::success('Restaurant Information has been updated.');

		return redirect()->route('restaurants.create');
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
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
