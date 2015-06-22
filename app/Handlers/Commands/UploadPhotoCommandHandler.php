<?php namespace App\Handlers\Commands;

use App\Commands\UploadPhotoCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;

class UploadPhotoCommandHandler {


	protected $restaurant;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(RestaurantRepositoryInterface $restaurant)
	{
		$this->restaurant = $restaurant;
	}

	/**
	 * Handle the command.
	 *
	 * @param  UploadPhotoCommand  $command
	 * @return void
	 */
	public function handle(UploadPhotoCommand $command)
	{
		$photo = $command->photo;
		$filename = $photo->getClientOriginalName();
		$extension = $photo->getClientOriginalExtension();								
		$new_filename = time().'.'.$extension;

		try {
			$photo->move(public_path() . '/images/uploads/', time().'.'.$extension);
			$this->restaurant->updateLogo($command->restaurantId, $new_filename);
		} catch (Exception $e) {
			
		}
	}

}
