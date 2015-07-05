<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	protected $fillable = [
		'restaurant_id',
		'category_id',
		'name',
		'description',
		'price',
		'image',
		'options'
	];

	public function restaurant() {
		return $this->belongsTo('App\Restaurant');
	}

}
