<?php namespace App\Handlers\Commands;

use App\Commands\CreateUserCommand;

use Illuminate\Queue\InteractsWithQueue;

use App\Repo\Users\UserRepositoryInterface;

use Session;

class CreateUserCommandHandler {

	protected $user;
	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(UserRepositoryInterface $user)
	{
		$this->user = $user;
	}

	/**
	 * Handle the command.
	 *
	 * @param  CreateUserCommand  $command
	 * @return void
	 */
	public function handle(CreateUserCommand $command)
	{
	
		$data = [
			'name' 				=> $command->contactName,
			'email' 			=> $command->email,
			'password'			=> $command->password,
			'hasRestaurant' 	=> (int)$command->hasRestaurant,
			'role'				=> $command->role
		];		

		/**
		 * Store user information
		 * @var [type]
		 */
		$user = $this->user->store( $data );

		Session::put('user_id', $user->id);
		Session::put('user_name', $command->contactName);
		Session::put('user_email', $command->email);


	}

}
