<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class RestaurantWasRegistered extends Event {

	use SerializesModels;

	public $restaurant;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct( $restaurant )
	{
		$this->restaurant = $restaurant;
	}

}
