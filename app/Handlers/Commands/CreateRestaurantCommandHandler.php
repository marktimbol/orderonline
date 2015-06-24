<?php namespace App\Handlers\Commands;

use App\Commands\CreateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Timings\TimingRepositoryInterface;

use App\Events\RestaurantWasRegistered;
use Auth;
use Session;

class CreateRestaurantCommandHandler {

	protected $restaurant;
	protected $timing;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct( RestaurantRepositoryInterface $restaurant, TimingRepositoryInterface $timing )
	{
		$this->restaurant = $restaurant;
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

		$data = [
			'user_id'		=> Session::get('user_id'),
			'name' 			=> $command->name,
			'countryCode'	=> $command->country,
			'telephone' 	=> $command->telephone
		];		

		/**
		 * Store restaurant information
		 * @var [type]
		 */
		$restaurant = $this->restaurant->store( $data );

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

		Auth::loginUsingId( Session::get('user_id') );

		Session::forget('user_id');
		Session::forget('user_name');
		Session::forget('user_email');
	}

}
