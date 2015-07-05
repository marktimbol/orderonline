<?php namespace App\Handlers\Commands;

use App\Commands\UploadMenuPhotoCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Restaurants\RestaurantRepositoryInterface;
use App\Repo\Menus\MenuRepositoryInterface;

class UploadMenuPhotoCommandHandler {


	protected $restaurant;

	protected $menu;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(RestaurantRepositoryInterface $restaurant, MenuRepositoryInterface $menu)
	{
		$this->restaurant = $restaurant;
		$this->menu = $menu;
	}

	/**
	 * Handle the command.
	 *
	 * @param  UploadPhotoCommand  $command
	 * @return void
	 */
	public function handle(UploadMenuPhotoCommand $command)
	{

		$restaurant = $this->restaurant->find($command->restaurant_id);
		
		$image = $command->image;
		$filename = $image->getClientOriginalName();
		$extension = $image->getClientOriginalExtension();	

		$restaurantDirectory = str_slug($restaurant->name, '-'); //burger-king					
		$imageFileName = time().'.'.$extension; //43243243.jpg
		$imageWithDirectory = $restaurantDirectory . '/' . $imageFileName; //burger-king/432432432.jpg

		try {
			$image->move(public_path() . '/images/uploads/' . $restaurantDirectory, $imageFileName);
			$this->menu->updateLogo($command->menu_id, $imageWithDirectory);
		} catch (Exception $e) {
			
		}

		session(['menu_id' => '']);
	}

}
