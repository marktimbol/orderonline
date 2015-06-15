<?php namespace App\Handlers\Commands;

use App\Commands\UpdateRestaurantCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Timings\TimingRepositoryInterface;

class UpdateRestaurantCommandHandler {


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

		$timings = $command->timings;

		$this->timing->update($command->id, $timings);

		$restaurant->cuisines()->attach($command->cuisine);
	}

}
