<?php namespace App\Commands;

use App\Commands\Command;

class UpdateRestaurantCommand extends Command {

	public $id;
	public $name;
	public $description;
	public $telephone;
	public $workingHours;
	public $minimumOrderAmount;
	public $hasDelivery;
	public $deliveryCharge;
	public $minimumDeliveryTime;
	public $paymentMethod;
	public $countryCode;
	public $city;
	public $zip;
	public $address;
	public $cuisine;

	public $timings = array();

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct( $id, $name, $description, $telephone, $workingHours=0, $minimumOrderAmount, $hasDelivery = null, $deliveryCharge, $minimumDeliveryTime, $paymentMethod, $countryCode, $city, $zip, $address, $cuisine, $timings = array())
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->telephone = $telephone;
		$this->workingHours = $workingHours;
		$this->minimumOrderAmount = $minimumOrderAmount;
		$this->hasDelivery = $hasDelivery;
		$this->deliveryCharge = $deliveryCharge;
		$this->minimumDeliveryTime = $minimumDeliveryTime;
		$this->paymentMethod = $paymentMethod;
		$this->countryCode = $countryCode;
		$this->city = $city;
		$this->zip = $zip;
		$this->address = $address;
		$this->cuisine = $cuisine;

		$this->timings = $timings;
	}

}
