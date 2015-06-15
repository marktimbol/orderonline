<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model {

	protected $fillable = [
		'restaurant_id',
		'schedule'
	];
	
	public function restaurant() {
		return $this->belongsTo('App\Restaurant');
	}
}