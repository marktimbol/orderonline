<?php namespace App\Handlers\Commands;

use App\Commands\UpdateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;

class UpdateRestaurantCommandHandler {


	protected $restaurant;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct( RestaurantRepositoryInterface $restaurant )
	{
		$this->restaurant = $restaurant;
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
			'name'					=> $command->name,
			'description'			=> $command->description,	
			'telephone'				=> $command->telephone,
			'workingHours'			=> $command->workingHours,
			'minimumOrderAmount'	=> $command->minimumOrderAmount,
			'hasDelivery'			=> $command->hasDelivery,
			'deliveryCharge'		=> $command->deliveryCharge,
			'minimumDeliveryTime'	=> $command->minimumDeliveryTime,
			'paymentMethod'			=> $command->paymentMethod,
			'countryCode'			=> $command->countryCode,
			'city'					=> $command->city,
			'zip'					=> $command->zip,
			'address'				=> $command->address,
			'cuisine'				=> $command->cuisine
		];

		$restaurant = $this->restaurant->update($command->id, $data);

		$restaurant->cuisines()->attach($command->cuisine);
	}

}
