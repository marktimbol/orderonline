<?php namespace App\Handlers\Events;

use App\Events\RestaurantWasRegistered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Mail\Mailer;

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

		$contactName = $event->restaurant->contactName;
		$email = $event->restaurant->email;

		$emailData = [
			'name' 			=> $event->restaurant->name,
			'contactName' 	=> $contactName,
			'address'		=> $event->restaurant->address,
			'telephone' 	=> $event->restaurant->telephone,
			'email' 		=> $email
			// 'hasDelivery' 	=> $event->restaurant->hasDelivery,
			// 'cuisine' 		=> $event->restaurant->cuisine
		];


		$subject = 'Thank you for registering your restaurant with us.';

		$this->mailer->send('emails.welcome', $emailData, function($message) use( $contactName, $email, $subject)
		{
			$message->from( getenv('ADMIN_EMAIL'), getenv('ADMIN_NAME') );
		    $message->to( $email, $contactName)->subject( $subject );
		
		});
	}


}
