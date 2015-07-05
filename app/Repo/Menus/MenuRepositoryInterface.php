<?php namespace App\Repo\Menus;

interface MenuRepositoryInterface {
	
	public function all();

	public function find($id);

	public function store($data);

	public function update($id, $data);

	public function destroy($id);
	
}