<?php namespace App\Handlers\Commands;

use App\Commands\UpdateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

class UpdateRestaurantCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  UpdateRestaurantCommand  $command
	 * @return void
	 */
	public function handle(UpdateRestaurantCommand $command)
	{
		$data = [
			'name'
			'description'
			'telephone'
			'workingHours'
			'minimumDeliveryTime'
			'hasDelivery'
			'deliveryCharge'
			'minimumDeliveryTime'
			'paymentMethod'
			'countryCode'
			'city'
			'zip'
			'address'
			'cuisine'
		];
	}

}
