<?php namespace App\Handlers\Events;

use App\Events\RestaurantWasRegistered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Mail\Mailer;

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

		$name = $event->restaurant->name;
		$email = $event->restaurant->email;

		$emailData = [
			'user_id'		=> $event->restaurant->user_id,
			'name' 			=> $name,
			'contactName' 	=> $event->restaurant->contactName,
			'email' 		=> $email,
			'telephone' 	=> $event->restaurant->telephone,
			'countryCode'	=> $event->restaurant->countryCode
			// 'address'		=> $event->restaurant->address,
			// 'hasDelivery' 	=> $event->restaurant->hasDelivery,
			// 'cuisine' 		=> $event->restaurant->cuisine
		];


		$subject = $name . ' has been registered from the website.';

		$this->mailer->send('emails.welcome', $emailData, function($message) use( $subject)
		{
			$message->from( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') );
		    $message->to( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') )->subject( $subject );
		
		});
	}

}
