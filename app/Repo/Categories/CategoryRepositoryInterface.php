<?php namespace App\Repo\Categories;

interface CategoryRepositoryInterface {
	
	public function all();

	public function find($id);

	public function store($restaurant, $data);

	public function update($categoryId, $data);

	public function destroy($categoryId);
	
}