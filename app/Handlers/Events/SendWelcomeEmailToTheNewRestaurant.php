<?php namespace App\Handlers\Events;

use App\Events\RestaurantWasRegistered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Mail\Mailer;
use Session;

class SendWelcomeEmailToTheNewRestaurant {

	protected $mailer;
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct( Mailer $mailer )
	{
		$this->mailer = $mailer;
	}

	/**
	 * Handle the event.
	 *
	 * @param  RestaurantWasRegistered  $event
	 * @return void
	 */
	public function handle(RestaurantWasRegistered $event)
	{

		$name = Session::get('user_name');
		$email = Session::get('user_email');

		$data = [
			'name' 			=> $name,
			'telephone' 	=> $event->restaurant->telephone,
			'email' 		=> $email
		];


		$subject = 'Thank you for registering your restaurant with us.';

		$this->mailer->send('emails.welcome', $data, function($message) use( $name, $email, $subject)
		{
			$message->from( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') );
		    $message->to( $email, $name)->subject( $subject );
		
		});
	}


}
