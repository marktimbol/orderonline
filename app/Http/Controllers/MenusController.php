<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMenuRequest;
use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Menus\MenuRepositoryInterface;

use Laracasts\Flash\Flash;
use App\Commands\CreateMenuCommand;
use App\Commands\UploadMenuPhotoCommand;

class MenusController extends Controller {

	protected $restaurant;
	protected $menu;

	public function __construct(RestaurantRepositoryInterface $restaurant, MenuRepositoryInterface $menu) {
		$this->restaurant = $restaurant;
		$this->menu = $menu;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($restaurants)
	{
		$restaurant = $restaurants;

		$menus = $restaurant->menus()->latest()->get();

		return view('dashboard.restaurants.menus.index', compact('restaurant', 'menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($restaurants)
	{
		$restaurant = $restaurants;

		$categories = $restaurant->categories()->lists('name', 'id');

		return view('dashboard.restaurants.menus.create', compact('restaurant', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($restaurants, CreateMenuRequest $request)
	{

		$this->dispatchFrom(CreateMenuCommand::class, $request);	

		if( $request->hasFile('image') ) {
			$this->dispatch(
				new UploadMenuPhotoCommand(session('menu_id'), $restaurants->id, $request->file('image'))
			);		
		}

		Flash::success('New Menu has been added.');

		return redirect()->route('dashboard.restaurants.menus.index', $restaurants->id);
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
	public function edit($restaurants, $menus)
	{
		$restaurant = $restaurants;
		$menu = $menus;

		$categories = $restaurant->categories()->lists('name', 'id');

		return view('dashboard.restaurants.menus.edit', compact('restaurant', 'menu', 'categories'));
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

	public function getMenus($menus) {
		return $this->menu->find($menus);
	}		

}
