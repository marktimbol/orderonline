<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantCuisinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurant_cuisines', function(Blueprint $table)
		{
			$table->integer('restaurant_id')->unsigned();
			$table->integer('cuisine_id')->unsigned();
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
		Schema::drop('restaurant_cuisines');
	}

}
