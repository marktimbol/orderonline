<?php namespace App\Handlers\Events;

use App\Events\RestaurantWasRegistered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Mail\Mailer;
use Session;

class SendEmailToAdminAboutNewRestaurant {


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

		$restaurantName = $event->restaurant->name;
		$contactName = Session::get('user_name');
		$email = Session::get('user_email');

		$emailData = [
			'restaurantName' => $restaurantName,
			'name' 			=> $contactName,
			'email' 		=> $email,
			'telephone' 	=> $event->restaurant->telephone,
			'countryCode'	=> $event->restaurant->countryCode
		];


		$subject = $restaurantName . ' has been registered from the website.';

		$this->mailer->send('emails.welcome', $emailData, function($message) use( $subject)
		{
			$message->from( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') );
		    $message->to( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') )->subject( $subject );
		
		});
	}

}
