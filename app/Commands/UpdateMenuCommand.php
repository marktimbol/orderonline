<?php namespace App\Commands;

use App\Commands\Command;

class UpdateMenuCommand extends Command {

	public $restaurant_id;
	public $menu_id;
	public $category;
	public $name;
	public $description;
	public $price;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($restaurant_id, $menu_id, $category, $name, $description, $price)
	{
		$this->restaurant_id = $restaurant_id;
		$this->menu_id = $menu_id;
		$this->category = $category;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

}
