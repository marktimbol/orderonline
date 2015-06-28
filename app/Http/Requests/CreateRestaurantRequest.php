<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRestaurantRequest extends Request {

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
			'contactName' 			=> 'required',
			'email'					=> 'required|email',
			'password'				=> 'required|min:8',
			'country'				=> 'required',
			'telephone' 			=> 'required'
		];
	}

}
