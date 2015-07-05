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

		$restaurant = $this->restaurant->find($command->restaurantId);
		
		$photo = $command->photo;
		$filename = $photo->getClientOriginalName();
		$extension = $photo->getClientOriginalExtension();	

		$restaurantDirectory = str_slug($restaurant->name, '-'); //burger-king					
		$imageFileName = time().'.'.$extension; //43243243.jpg
		$imageWithDirectory = $restaurantDirectory . '/' . $imageFileName; //burger-king/432432432.jpg

		try {
			$photo->move(public_path() . '/images/uploads/' . $restaurantDirectory, $imageFileName);
			$this->restaurant->updateLogo($command->restaurantId, $imageWithDirectory);
		} catch (Exception $e) {
			
		}
	}

}
