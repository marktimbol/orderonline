<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model {

	protected $fillable = ['cuisine'];

	public function restaurant() {
		return $this->belongsToMany('App\Restaurant', 'restaurant_cuisines');
	}

}