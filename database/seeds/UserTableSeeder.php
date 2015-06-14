<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{			
		$faker = Faker\Factory::create();
		
		for( $i=1; $i<=20; $i++) {

			User::create([
				'name' => $faker->name,
				'email'	=> $faker->email,
				'password'	=> 'secret'
				]);
			
		}

	}

}
