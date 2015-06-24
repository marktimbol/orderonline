<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class CreateRestaurantCommand extends Command {

	use InteractsWithQueue, SerializesModels;

	public $name;
	public $country;
	public $telephone;
	// public $address;
	// public $hasDelivery;
	// public $cuisine;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct( $name, $country, $telephone )
	{
		$this->name = $name;
		$this->country = $country;
		$this->telephone = $telephone;
	}

}
