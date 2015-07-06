<?php namespace App\Handlers\Commands;

use App\Commands\UpdateMenuCommand;

use Illuminate\Queue\InteractsWithQueue;
use App\Repo\Menus\MenuRepositoryInterface;

class UpdateMenuCommandHandler {

	protected $menu;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(MenuRepositoryInterface $menu)
	{
		$this->menu = $menu;
	}

	/**
	 * Handle the command.
	 *
	 * @param  UpdateMenuCommand  $command
	 * @return void
	 */
	public function handle(UpdateMenuCommand $command)
	{
		$data = [
			'category_id'	=> $command->category,
			'name' 			=> $command->name,
			'description'	=> $command->description,
			'price'			=> $command->price
		];
		
		$this->menu->update($command->menu_id, $data);

	}

}
