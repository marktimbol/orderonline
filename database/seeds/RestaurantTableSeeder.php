<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Restaurant;


class RestaurantTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{			
		$faker = Faker\Factory::create();
		
		for( $i=1; $i<=20; $i++) {

			Restaurant::create([
				'user_id' => 1,
				'name' => $faker->name,
				'description' => $faker->paragraph,
				'email'	=> $faker->email
				]);
			
		}

	}

}
