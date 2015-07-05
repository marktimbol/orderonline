<?php namespace App\Commands;

use App\Commands\Command;

class UploadMenuPhotoCommand extends Command {

	public $menu_id;
	public $restaurant_id;
	public $image;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($menu_id, $restaurant_id, $image)
	{
		$this->menu_id = $menu_id;
		$this->restaurant_id = $restaurant_id;
		$this->image = $image;
	}

}
