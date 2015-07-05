<?php namespace App\Handlers\Commands;

use App\Commands\CreateMenuCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Menus\MenuRepositoryInterface;

use App\Commands\UploadMenuPhotoCommand;


class CreateMenuCommandHandler {

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
	 * @param  CreateMenuCommand  $command
	 * @return void
	 */
	public function handle(CreateMenuCommand $command)
	{
	
		$data = [
			'restaurant_id' => $command->restaurant_id,
			'category_id'	=> $command->category,
			'name'			=> $command->name,
			'description'	=> $command->description,
			'price'			=> $command->price
		];

		$menu = $this->menu->store($data);

		session(['menu_id' => $menu->id]);
		
	}

}
