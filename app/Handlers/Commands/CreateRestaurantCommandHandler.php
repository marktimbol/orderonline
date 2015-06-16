<?php namespace App\Handlers\Commands;

use App\Commands\CreateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Users\UserRepositoryInterface;
use App\Repo\Timings\TimingRepositoryInterface;

use App\Events\RestaurantWasRegistered;

use Auth;

class CreateRestaurantCommandHandler {

	protected $restaurant;
	protected $user;
	protected $timing;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct( RestaurantRepositoryInterface $restaurant, UserRepositoryInterface $user, TimingRepositoryInterface $timing )
	{
		$this->restaurant = $restaurant;
		$this->user = $user;
		$this->timing = $timing;
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
		 * Store restaurant timings
		 */
		$defaultTimings = array(
			['day' => 'Sunday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Monday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Tuesday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Wednesday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Thursday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Friday', 'open' => '', 'close' => '', 'dayoff' => ''],
			['day' => 'Saturday', 'open' => '', 'close' => '', 'dayoff' => '']

		);
		
		$this->timing->store($restaurant->id, $defaultTimings);



		event( new RestaurantWasRegistered( $restaurant ) );

		Auth::loginUsingId( $user->id );
	}

}
