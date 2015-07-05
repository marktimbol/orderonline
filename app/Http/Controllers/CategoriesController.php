<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Response;
use Laracasts\Flash\Flash;

use App\Repo\Users\UserRepositoryInterface;
use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Categories\CategoryRepositoryInterface;

use App\Http\Requests\CreateCategoryRequest;

class CategoriesController extends Controller {

	protected $user;
	protected $restaurant;
	protected $category;

	public function __construct(UserRepositoryInterface $user, CategoryRepositoryInterface $category, RestaurantRepositoryInterface $restaurant) {
		$this->user = $user;
		$this->restaurant = $restaurant;
		$this->category = $category;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($restaurants)
	{
		$restaurant = $restaurants;

		$categories = $restaurant->categories()->get();

		return view('dashboard.restaurants.categories.index', compact('restaurant', 'categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($restaurants)
	{
		$restaurant = $restaurants;

		return view('dashboard.restaurants.categories.create', compact('restaurant'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($restaurants, CreateCategoryRequest $request)
	{
		$this->category->store($restaurants, $request->all());

		Flash::success('New Category has been added.');

		return redirect()->route('dashboard.restaurants.categories.index', $restaurants->id);		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($restaurants, $categories)
	{
		// dd($restaurants);
		// dd($categories);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($restaurants, $categories)
	{
		$restaurant = $restaurants;
		$category = $categories;

		return view('dashboard.restaurants.categories.edit', compact('restaurant', 'category'));
		
		// if( $this->user->owns($restaurant) ) {
		// 	return view('dashboard.restaurants.categories.edit', compact('restaurant', 'category'));
		// }		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($restaurants, $categories, CreateCategoryRequest $request)
	{
		$this->category->update($categories->id, $request->all());

		Flash::success('Category has been updated.');

		return redirect()->route('dashboard.restaurants.categories.index', $restaurants->id);			
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($restaurants, $categories)
	{
		$this->category->destroy($categories->id);

		Flash::success('Category has been deleted.');

		return redirect()->route('dashboard.restaurants.categories.index', $restaurants->id);
	}

	public function getCategories($categories) {
		return $this->category->find($categories);
	}	

}
