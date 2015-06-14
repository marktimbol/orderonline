<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();

			$table->string('name'); //restaurant Name
			$table->text('description'); //restaurant description
			
			$table->string('contactName'); //contact name
			$table->string('email');
			
			$table->string('telephone');
			
			$table->string('countryCode');
			$table->string('city');
			$table->string('zip');			
			$table->text('address');
			
			$table->string('workingHours');
			$table->string('minimumDeliveryTime');
			$table->double('minimumOrderAmount');
			$table->double('deliveryCharge');
			$table->string('paymentMethod');
			$table->boolean('hasDelivery');	

			$table->string('logo');		

			$table->foreign('user_id')->references('id')->on('users');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('restaurants');
	}

}
