<?php namespace App\Commands;

use App\Commands\Command;

class UploadPhotoCommand extends Command {

	public $restaurantId;
	public $photo;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($restaurantId, $photo)
	{
		$this->restaurantId = $restaurantId;
		$this->photo = $photo;
	}

}
