<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('restaurant_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('name');
			$table->text('description');
			$table->double('price');
			$table->string('image');
			$table->json('options');
			$table->foreign('restaurant_id')->references('id')->on('restaurants');
			$table->foreign('category_id')->references('id')->on('categories');
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
		Schema::drop('menus');
	}

}
