<?php namespace App\Commands;

use App\Commands\Command;

class UpdateRestaurantCommand extends Command {

	public $id;
	public $name;
	public $description;
	public $email;
	public $telephone;
	public $country;
	public $state;
	public $zip;
	public $address;
	public $currency;
	public $minimumOrderAmount;
	public $paymentMethod;
	public $hasDelivery;
	public $averageDeliveryTime;
	public $deliveryCharge;
	public $logo;

	public $cuisine;
	public $timings = array();

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct( $id, $name, $description, $email, $telephone, $country, $state, $zip, $address, $currency, $minimumOrderAmount, $paymentMethod, $hasDelivery = null, $averageDeliveryTime, $deliveryCharge, $logo=null, $cuisine, $timings = array())
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->email = $email;
		$this->telephone = $telephone;
		$this->minimumOrderAmount = $minimumOrderAmount;
		$this->hasDelivery = $hasDelivery;
		$this->deliveryCharge = $deliveryCharge;
		$this->averageDeliveryTime = $averageDeliveryTime;
		$this->paymentMethod = $paymentMethod;
		$this->country = $country;
		$this->state = $state;
		$this->zip = $zip;
		$this->address = $address;
		$this->currency = $currency;
		$this->cuisine = $cuisine;
		$this->timings = $timings;
	}

}
