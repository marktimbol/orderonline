<?php namespace App\Repo\Menus;

use App\Repo\Menus\MenuRepositoryInterface;
use App\Menu;

class MenuRepository implements MenuRepositoryInterface {
	
	public function all() {
		return Menu::all();
	}

	public function find($id) {
		return Menu::findOrFail($id);
	}

	public function store($data) {
		return Menu::create($data);
	}

	public function update($id, $data) {
		$menu = $this->find($id);
		$menu->fill($data);
		$menu->save();
	}

	public function destroy($id) {
		$menu = $this->find($id);
		$menu->delete();
	}

	public function updateLogo($id, $image) {
		$menu = $this->find($id);
		$menu->image = $image;
		$menu->save();
	}
}