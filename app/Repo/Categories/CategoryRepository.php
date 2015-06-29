<?php namespace App\Repo\Categories;

use App\Repo\Categories\CategoryRepositoryInterface;
use App\Category;

class CategoryRepository implements CategoryRepositoryInterface {
	
	public function all() {
		return Category::all();
	}

	public function find($id) {
		return Category::findOrFail($id);
	}

	public function store($restaurants, $data) {
		return $restaurants->categories()->create($data);
	}

	public function update($categoryId, $data) {
		$category = $this->find($categoryId);
		$category->fill($data);
		$category->save();
	}

	public function destroy($categoryId) {
		$category = $this->find($categoryId);
		$category->delete();
	}
}