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
			'email'					=> $command->email,
			'telephone'				=> $command->telephone,
			'minimumOrderAmount'	=> $command->minimumOrderAmount,
			'hasDelivery'			=> $command->hasDelivery,
			'deliveryCharge'		=> $command->deliveryCharge,
			'averageDeliveryTime'	=> $command->averageDeliveryTime,
			'paymentMethod'			=> $command->paymentMethod,
			'country'				=> $command->country,
			'state'					=> $command->state,
			'zip'					=> $command->zip,
			'address'				=> $command->address,
			'currency'				=> $command->currency
		];

		/**
		 * Update restaurant information
		 * @var [type]
		 */
		$restaurant = $this->restaurant->update($command->id, $data);

		/**
		 * Update restaurant timings
		 */
		$this->timing->update($command->id, $command->timings);

		/**
		 * Update restaurant cuisines
		 */
		$restaurant->cuisines()->attach($command->cuisine);
	}

}
