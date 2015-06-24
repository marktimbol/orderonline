<?php namespace App\Commands;

use App\Commands\Command;

class CreateUserCommand extends Command {

	public $contactName;
	public $email;
	public $password;
	public $hasRestaurant;
	public $role;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($contactName, $email, $password, $hasRestaurant, $role)
	{
		$this->contactName = $contactName;
		$this->email = $email;
		$this->password = $password;
		$this->hasRestaurant = (int)$hasRestaurant;
		$this->role = $role;
	}

}
