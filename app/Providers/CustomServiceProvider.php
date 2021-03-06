<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app->bind(
			'App\Repo\Users\UserRepositoryInterface',
			'App\Repo\Users\UserRepository'
		);	

		$this->app->bind(
			'App\Repo\Restaurants\RestaurantRepositoryInterface',
			'App\Repo\Restaurants\RestaurantRepository'
		);

		$this->app->bind(
			'App\Repo\Cuisines\CuisineRepositoryInterface',
			'App\Repo\Cuisines\CuisineRepository'
		);	

		$this->app->bind(
			'App\Repo\Countries\CountryRepositoryInterface',
			'App\Repo\Countries\CountryRepository'
		);		

		$this->app->bind(
			'App\Repo\Timings\TimingRepositoryInterface',
			'App\Repo\Timings\TimingRepository'
		);	

		$this->app->bind(
			'App\Repo\Categories\CategoryRepositoryInterface',
			'App\Repo\Categories\CategoryRepository'
		);			

		$this->app->bind(
			'App\Repo\Menus\MenuRepositoryInterface',
			'App\Repo\Menus\MenuRepository'
		);				
	}

}
