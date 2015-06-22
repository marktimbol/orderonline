<?php namespace App\Commands;

use App\Commands\Command;

class CreateUserCommand extends Command {

	public $name;
	public $email;
	public $password;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($name, $email, $password)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}

}
