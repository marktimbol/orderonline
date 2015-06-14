<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {

	protected $fillable = [
		'user_id', 'name', 'contactName', 'email', 'telephone', 'countryCode', 'address', 'hasDelivery',
		'description', 'city', 'zip', 'workingHours', 'minimumDeliveryTime', 'minimumAmount', 'deliveryCharge', 'paymentMethod'
	];
	
	public function cuisines() {
		return $this->belongsToMany('App\Cuisine', 'restaurant_cuisines');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}