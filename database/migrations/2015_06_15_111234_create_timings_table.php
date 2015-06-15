<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('restaurant_id')->unsigned();
			$table->json('schedule');

			$table->foreign('id')->references('id')->on('restaurants');
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
		Schema::drop('timings');
	}

}
