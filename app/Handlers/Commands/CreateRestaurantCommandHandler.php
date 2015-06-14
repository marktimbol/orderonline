<?php namespace App\Handlers\Commands;

use App\Commands\CreateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Users\UserRepositoryInterface;

use App\Events\RestaurantWasRegistered;

use Auth;

class CreateRestaurantCommandHandler {

	protected $restaurant;
	protected $user;
	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct( RestaurantRepositoryInterface $restaurant, UserRepositoryInterface $user )
	{
		$this->restaurant = $restaurant;
		$this->user = $user;
	}

	/**
	 * Handle the command.
	 *
	 * @param  CreateRestaurantCommand  $command
	 * @return void
	 */
	public function handle(CreateRestaurantCommand $command)
	{

		$userData = [
			'name' 				=> $command->contactName,
			'email' 			=> $command->email,
			'password'			=> $command->password,
			'restaurantOwner' 	=> 1
		];		

		/**
		 * Store user information
		 * @var [type]
		 */
		$user = $this->user->store( $userData );

		$restaurantData = [
			'user_id'		=> $user->id,
			'name' 			=> $command->name,
			'contactName' 	=> $command->contactName,
			'email' 		=> $command->email,
			'countryCode'	=> $command->country,
			'telephone' 	=> $command->telephone
		];		

		/**
		 * Store restaurant information
		 * @var [type]
		 */
		$restaurant = $this->restaurant->store( $restaurantData );

		/**
		 * Store the restaurant's cuisine
		 */
		//$restaurant->cuisines()->attach($command->cuisine);


		event( new RestaurantWasRegistered( $restaurant ) );

		Auth::loginUsingId( $user->id );

		session(['restaurant_id' => $restaurant->id]);
	}

}
