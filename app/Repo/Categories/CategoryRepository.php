<?php namespace App\Repo\Categories;

use App\Repo\Categories\CategoryRepositoryInterface;
use App\Category;

class CategoryRepository implements CategoryRepositoryInterface {
	
	public function all() {
		return Category::all(['id','name']);
	}
}