<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRestaurantRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' 					=> 'required',
			//'description'			=> '',
			'telephone'				=> 'required',
			//'workingHours'			=> '',
			//'minimumOrderAmount'	=> '',
			//'hasDelivery'			=> '',
			//'deliveryCharge'		=> '',
			//'minimumDeliveryTime'	=> '',
			//'paymentMethod'			=> 'required',
			'countryCode'			=> 'required'
			//'city'					=> '',
			//'zip'					=> '',
			//'address'				=> '',
			//'cuisine'				=> 'required'
		];
	}

}
